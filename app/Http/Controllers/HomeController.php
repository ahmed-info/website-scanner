<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controller\HomeControler;
use App\Http\Controller\CaegorytControler;
use App\Http\Controller\ProductControler;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\About;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as FacadesDB;

class HomeController extends Controller
{

    public function home(){
        
        //$categories = Category::all();
        //$products = Product::all();

        $products = FacadesDB::table('products')->orderBy('id', 'desc')->get();
        $categories = FacadesDB::table('categories')->orderBy('id', 'desc')->get();
        //echo $categories;
        return view('main.home', compact(['categories','products']));
    }
    public function category($id){
        $categories= Category::all();
        $cate= Category::find($id);

        //$products = Product::get()->where('category_id', $id);
        $lowerType= Str::of('Scanner')->lower();
        $products = Product::where('category_id', $id)->
        where('type',$lowerType)->get();
        //$categories= Category::find($id);
        //return $categories;
        return view('scanners.index', compact(['categories','products','cate']));
    }
    public function about()
    {
        $categories = Category::all();
        $abouts = About::all();
        return view('main.about', compact(['categories','abouts']));
    }

    public function scanners()
    {
        $categories = Category::all();
        $products = Product::all();
        //return $product->id;
        return view('scanners.index', compact(['products','categories']));
    }
    public function blog()
    {
        //$categories = FacadesDB::table('categories')->orderBy('id', 'desc')->get();
        $categories = Category::all();
        $blogs = Blog::all();
        //return $blogs;
        return view('main.blog',compact(['categories','blogs']));
    }
    public function aboutDetails($id)
    {
        $categories = Category::all();
        $about = About::find($id);

        return view('main.about_details', compact(['categories','about']));
    }
    public function products($id){
        $products = Product::get()->where('id', $id);
        //return $products;

        return view('scanners.index', compact(['categories','products']));
    }

    public function productDetails($id){
        $categories = Category::all();
        $product = Product::find($id);
        //return "product details";
        //$images = Image::select($id)->get();
        $images = DB::table('images')->where('product_id', $id)->get();

        return view('main.product_details', compact(['categories','product','images']));

    }

    public function contact()
    {
        $categories = Category::all();
        return view('main.contact', compact('categories'));
    }

}