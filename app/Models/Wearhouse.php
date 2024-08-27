<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wearhouse extends Model
{
    use HasFactory;
    protected $fillable = [
            'supplier_name',
            'product_name',
            'quantity_in_stock',
            'unit_price',
            'total_value',
            'other_details',
            'audit_by'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_name','id');
    }
}
