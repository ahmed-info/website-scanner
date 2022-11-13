<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
use App\Models\Image;
use DB;
use App\Models\Blog;
use Illuminate\Support\Facades\DB as FacadesDB;

use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index(){
        return view('scanners.index');
    }
    public function list()
    {
        $products = FacadesDB::table('products')->orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('pages.product.list', compact(['products','categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create',compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'title_en'=>'required|string',
           'title_ar'=>'required|string',
        //    'description_en' =>'required|max:255',
        //    'description_ar' =>'required|max:255',
        //    'image' => 'required|image',
        //    'price' => 'required|numeric',
        //    'price_old' => 'numeric',
        //    'type'=>'required|string',
        //    'brand'=>'required|string',
        //    'model'=>'required|string',
        //    'stock'=>'string',
        //    'shipping_weight'=>'string',
        //    'shipping_dimensions'=>'string',


        ]);
        $category = Category::findOrFail($request->category_id);
        $products = new Product;
        $products->title_en = $request->title_en;
        $products->title_ar = $request->title_ar;
        $products->description_en = $request->description_en;
        $products->description_ar = $request->description_ar;

        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = $img_file->getClientOriginalName();
            $img_file->storeAs('public/image/product', $img_name);
            $products->image = 'storage/image/product/'. $img_name;
            //$img_file->storeAs('public/img/service','bc_img.'.$img_file->getClientOriginalExtension());
            //$Services->bc_img = 'storage/img/service/bc_img.'.$img_file->getClientOriginalExtension();
        }
        $products->price = $request->price;
        $products->price_old = $request->price_old;
        $products->type = $request->type;
        $products->brand = $request->brand;
        $products->model = $request->model;
        $products->stock = $request->stock;
        $products->shipping_weight = $request->shipping_weight;
        $products->shipping_dimensions = $request->shipping_dimensions;
        $products->category_id = $request->category_id;
        $products->save();
        //return $request-all();
        $category->products()->save($products);

        //Images
        if($request->hasFile('images')){
            $files = $request->file("images");
            foreach($files as $file){
                $images = new Image;
                $imageName = time().'_'.$file->getClientOriginalName();
                $file->storeAs('public/image/product', $imageName);

                $images->product_id = $products->id;
                $images->image = 'storage/image/product/'.$imageName;

                $images->save();
            }
        }
        return redirect()->route('admin.product.list')->with('success', "New service created successfully");
    }

    public function show($id)
    {
        $product = Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('pages.product.edit', compact(['product','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_en'=>'required|string',
            'title_ar' =>'required|string',
            'description_en' =>'required|max:255',
            'description_ar' =>'required|max:255',
            'price' => 'required|numeric',
            'image' => 'image',
            'price_old' => 'numeric',
           'type'=>'required|string',
           'brand'=>'required|string',
           'model'=>'required|string',
           'stock'=>'string',
           'shipping_weight'=>'string',
           'shipping_dimensions'=>'string',
            'category_id'=> 'required'
         ]);
         $product = Product::find($id);
         $product->title_en = $request->title_en;
         $product->title_ar = $request->title_ar;
         $product->description_en = $request->description_en;
         $product->description_ar = $request->description_ar;

         if($request->file('image')){
             $img_file = $request->file('image');
             $img_name = $img_file->getClientOriginalName();
             $img_file->storeAs('public/image/product', $img_name);
             $product->image = 'storage/image/product/'. $img_name;

             //$img_file->storeAs('public/img/service','bc_img.'.$img_file->getClientOriginalExtension());
             //$Services->bc_img = 'storage/img/service/bc_img.'.$img_file->getClientOriginalExtension();
         }
        $product->price = $request->price;
        $products->price_old = $request->price_old;
        $products->type = $request->type;
        $products->brand = $request->brand;
        $products->model = $request->model;
        $products->stock = $request->stock;
        $products->shipping_weight = $request->shipping_weight;
        $products->shipping_dimensions = $request->shipping_dimensions;
        $product->category_id = $request->category_id;

          $product->update();
         return redirect()->route('admin.product.list')->with('success', "service updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $destination = $product->image;
        if(File::exists($destination)){
            File::delete($destination);
        }else{
            return redirect()->route('admin.product.list')->with('error','Service Field delete');
        }
        $product->delete();

        return redirect()->route('admin.product.list')->with('success','Service Deleted Successfully');
    }
}