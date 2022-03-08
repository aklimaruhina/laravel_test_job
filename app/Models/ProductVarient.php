<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVarient extends Model
{
    use HasFactory;
    protected $casts = ['details' => 'array'];
    // protected static function booted()
    // {
    //     static::creating(function ($productvarient) {
    //         //
    //         $productvarient->details = json_encode(request('attr_val'));
    //         $productvarient->save();
    //     });
    // }
    public function products(){
    	return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
