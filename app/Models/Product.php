<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    //use HasFactory;
    protected $table = 'products';
    protected $guarded = [];
    // protected $fillable = [
    //     'title_en',
    //     'title_ar',
    //     'description_en',
    //     'description_ar',
    //     'image',
    //     'price',
    //     'category_id'
    // ];

    public function product(){
        return $this->hasMany(Product::class,'category_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}