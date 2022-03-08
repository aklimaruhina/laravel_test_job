<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
 	
 	protected $fillable = ['product_name', 'slug'];

    public function setNameAttribute($value)
    {
        $this->attributes['product_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function varients(){
    	return $this->hasMany(ProductVarient::class);
    }
    public function attribut(){
    	return $this->hasMany(Attribute::class);
    }
    public function productAttribut(){
        return $this->hasMany(ProductAttribut::class);
    }
    public function delete()
    {
        $this->varients()->delete();
        $this->productAttribut()->delete();
        return parent::delete();
    }
}
