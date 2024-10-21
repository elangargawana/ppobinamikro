<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    use HasFactory;
    protected $table = 'sales_invoice';
    protected $primaryKey = 'id';
    protected $fillable = [
        'merchant_id',
        'product_category_id',
        'product_id',
        'product_price_id',
        'item_unit_price',
        'total_amount',
        'sales_invoice_date',
        'created_id',
        'edited_id',
        'deleted_id'
    ];
}
