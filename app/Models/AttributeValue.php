<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    public function parents(){
    	return $this->belongsTo('App\Models\Attribute', 'attribute_id');
    }
}
