<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Models\Category;
use App\Models\Entity;
use App\Repositories\EntityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntityController extends Controller
{
    public function populateEntity(){
        try {
            //call service que retornara array con entidades correspondientes
            $entities = EntityRepository::extractEntities();

            DB::beginTransaction();
            foreach ($entities as $entity){
                $category_id = Category::where('category', $entity['Category'])->first()->id;

                Entity::create([
                    'api' => $entity['API'],
                    'description' => $entity['Description'],
                    'link' => $entity['Link'],
                    'category_id' => $category_id,
                ]);
            }
            DB::commit();
            return ApiResponse::created('Entities created ok');
        } catch (\Throwable $th) {
            DB::rollBack();
            return (config('app.debug')) ? ApiResponse::serverError($th->getMessage()) : ApiResponse::serverError();
        }
    }

    public function getEntities($category){
        try {
            $check_category = Category::where('category', $category)->first();
            if(!$check_category) return ApiResponse::badRequest('Category not available');

            $entities = Entity::where('category_id', $check_category->id)->with('category')->get();
            if(!count($entities)) return ApiResponse::badRequest('Not found entities');

            return ApiResponse::getOk('data', $entities);
        } catch (\Throwable $th) {
            return (config('app.debug')) ? ApiResponse::serverError($th->getMessage()) : ApiResponse::serverError();
        }
    }
}
