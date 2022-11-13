<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];
    //protected $fillable = ['name_en','name_ar','image'];
    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
    public function getProduct(){
        return $this->hasMany(Product::class);

    }
}