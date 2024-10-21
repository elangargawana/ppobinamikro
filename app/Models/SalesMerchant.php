<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesMerchant extends Model
{
    use HasFactory;
    protected $table = 'sales_merchant';
    protected $primaryKey = 'id';
    protected $fillable = [
        'merchant_code',
        'merchant_name',
        'merchant_address',
        'merchant_pin',
        'created_id',
        'edited_id',
        'deleted_id'
    ];
}
