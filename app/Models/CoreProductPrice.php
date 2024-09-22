<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreProductPrice extends Model
{
    use HasFactory;
    protected $table = 'core_product_price';
    protected $primaryKey = 'core_product_id';
    protected $fillable = [
        'product_category_id',
        'product_id',
        'item_unit_price',
        'product_price_code',
        'product_price_name',
        'created_id',
        'edited_id',
        'deleted_id'
    ];
}
