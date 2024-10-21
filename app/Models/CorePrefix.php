<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorePrefix extends Model
{
    use HasFactory;
    protected $table = 'core_prefix';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_category_id',
        'product_id',
        'prefix_code',
        'prefix_name',
        'created_id',
        'edited_id',
        'deleted_id'
    ];
}
