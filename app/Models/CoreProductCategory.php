<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreProductCategory extends Model
{
    use HasFactory;
    protected $table = 'core_product_category';
    protected $primaryKey = 'product_category_id';
    protected $fillable = [
        'product_id',
        'product_category_code',
        'product_category_name',
        'created_id',
        'edited_id',
        'deleted_id'
    ];
}
