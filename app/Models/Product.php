<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;

class Product extends Model
{
    //use SoftDelete;

    protected $fillable = [
        'name',
        'type', 
        'description', 
        'price',  
        'slug',
        'quantity'
    ];

    protected $hidden = [
        
    ];

    public function galleries() 
    {
        //return $this->hasMany(ProductGallery::class, 'products_id');
    }
    
}
