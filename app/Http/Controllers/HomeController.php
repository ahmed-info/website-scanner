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
use Illuminate\Database\Eloquent\Model;
use DB;
class HomeController extends Controller
{

    public function home(){
        $categories = Category::all();
        $products = Product::all();
        //echo $categories;
        return view('main.home', compact(['categories','products']));
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
    public function product($id){
        $products = Product::get()->where('category_id', $id);
        $categories= Category::get()->where('id',$id);
        //$categories= Category::find($id);
        //return $categories;
        return view('scanners.index', compact(['categories','products']));
    }
    public function contact()
    {
        $categories = Category::all();
        return view('main.contact', compact('categories'));
    }

}