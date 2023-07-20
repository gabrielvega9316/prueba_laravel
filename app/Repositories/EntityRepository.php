<?php

namespace App\Repositories;

use App\ApiResponse;
use Illuminate\Support\Facades\Http;

class EntityRepository {

    const API_URL = 'https://api.publicapis.org/entries';
    const ALLOWED_CATEGORIES = ['Animals', 'Security'];

    public static function extractEntities(){
        try {
            $response = Http::get(self::API_URL);

            if($response->ok()){
                $data = $response->json();
                $filteredEntities = self::filterEntities($data['entries']);
                return $filteredEntities;
            }

        } catch (\Throwable $th) {
            return (config('app.debug')) ? ApiResponse::serverError($th->getMessage()) : ApiResponse::serverError();
        }
    }

    private static function filterEntities(array $entities) {
        // logica para capturar solo categorias requeridas
        $filteredEntities = [];

        foreach($entities as $entity){
            if(in_array($entity['Category'], self::ALLOWED_CATEGORIES)){
                $filteredEntities[] = $entity;
            }
        }
        return $filteredEntities;
    }
}
