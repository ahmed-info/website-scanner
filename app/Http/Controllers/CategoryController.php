<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index($id){
        // $categories = Category::all();
        // $product = Product::find($id);
        // return view('scanners.index',compact(['categories', 'product']));
        $categories = Category::all();
        $product = Product::all();
        return view('scanners.index',compact(['categories', 'product']));
    }
    public function list()
    {
        //$services = Service::all();
        $categories = FacadesDB::table('categories')->orderBy('id', 'desc')->get();
        return view('pages.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.category.create');
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
           'name_en'=>'required|string',
           'name_ar'=>'required|string',
           'image' => 'required|image'
        ]);
        $Categories = new Category;
        $Categories->name_en = $request->name_en;
        $Categories->name_ar = $request->name_ar;

        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = $img_file->getClientOriginalName();
            $img_file->storeAs('public/image/category', $img_name);
            $Categories->image = 'storage/image/category/'. $img_name;
            //$img_file->storeAs('public/img/service','bc_img.'.$img_file->getClientOriginalExtension());
            //$Services->bc_img = 'storage/img/service/bc_img.'.$img_file->getClientOriginalExtension();
        }
         $Categories->save();
        return redirect()->route('admin.category.list')->with('success', "New service created successfully");
    }

    public function show($id)
    {
        $category = Category::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages.category.edit', compact('category'));
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
            'name_en'=>'required|string',
            'name_ar' =>'required|string',
            'image' => 'required|image'
         ]);
         $category = Category::find($id);
         $category->name_en = $request->name_en;
         $category->name_ar = $request->name_ar;

         if($request->file('image')){
             $img_file = $request->file('image');
             $img_name = $img_file->getClientOriginalName();
             $img_file->storeAs('public/image/category', $img_name);
             $category->image = 'storage/image/category/'. $img_name;
             //$destination = $category->image;
            //  if(File::exists($category->image)){
            //     File::delete($category->image);
            // }
         }
          $category->save();
        //    if(File::exists($category->image)){
        //         File::delete($category->image);
        //      }
         return redirect()->route('admin.category.list', app()->getLocale())->with('success', "service updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $destination = $category->image;
        if(File::exists($destination)){
            File::delete($destination);
        }else{
            return redirect()->route('admin.category.list', app()->getLocale())->with('error','Service Field delete');
        }
        $category->delete();

        return redirect()->route('admin.category.list', app()->getLocale())->with('success','Service Deleted Successfully');
    }
}