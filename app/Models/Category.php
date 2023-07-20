<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    protected $fillable = [
        'category'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
