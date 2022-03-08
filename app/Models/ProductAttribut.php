<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribut extends Model
{
    use HasFactory;

    public function products(){
    	return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function attributes(){
    	return $this->belongsTo('App\Models\Attribute', 'attribute_id');
    }
    public function attributeval(){
    	return $this->belongsTo('App\Models\AttributeValue', 'attribute_val_id');
    }

}
