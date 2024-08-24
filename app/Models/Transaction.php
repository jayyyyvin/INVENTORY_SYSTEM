<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','transaction_status','quantity','product_status','product_condition','other_details','incode_by'];

    public function product(){
        return $this->belongsTo(Product::class,'product_name','id');
    }


}
