<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreProduct extends Model
{
    use HasFactory;
    protected $table = 'core_product';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_category_id',
        'product_code',
        'product_name',
        'created_id',
        'edited_id',
        'deleted_id'
    ];
}
