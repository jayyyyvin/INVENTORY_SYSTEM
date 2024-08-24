<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = ['description','unit','quantity','price','supplier_id'];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
   

  
    
}

