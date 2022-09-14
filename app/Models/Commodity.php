<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id'];


    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }


    public function cities()
    {
        return $this->belongsToMany(\App\Models\City::class, 'city_commodity'); 
        
    }

}
