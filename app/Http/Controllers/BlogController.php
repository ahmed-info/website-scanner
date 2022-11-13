<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use DB;
use App\Models\Product;
use Illuminate\Support\Facades\DB as FacadesDB;

use Illuminate\Support\Facades\File;
class BlogController extends Controller
{
    public function index(){
        return view('scanners.index');
    }
    public function list()
    {
        $blogs = FacadesDB::table('blogs')->orderBy('id', 'desc')->get();
        return view('pages.blog.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.blog.create');
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
           'description_en' =>'required|max:255',
           'description_ar' =>'required|max:255',
           'image' => 'required|image'
        ]);
        $blogs = new Blog;
        $blogs->title_en = $request->title_en;
        $blogs->title_ar = $request->title_ar;
        $blogs->description_en = $request->description_en;
        $blogs->description_ar = $request->description_ar;

        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = $img_file->getClientOriginalName();
            $img_file->storeAs('public/image/blog', $img_name);
            $blogs->image = 'storage/image/blog/'. $img_name;
            //$img_file->storeAs('public/img/service','bc_img.'.$img_file->getClientOriginalExtension());
            //$Services->bc_img = 'storage/img/service/bc_img.'.$img_file->getClientOriginalExtension();
        }
         $blogs->save();
        return redirect()->route('admin.blog.list')->with('success', "New service created successfully");
    }

    public function show($id)
    {
        $blog = Blog::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('pages.blog.edit', compact('blog'));
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
            'image' => 'image'
         ]);
         $blog = Blog::find($id);
         $blog->title_en = $request->title_en;
         $blog->title_ar = $request->title_ar;
         $blog->description_en = $request->description_en;
         $blog->description_ar = $request->description_ar;

         if($request->file('image')){
             $img_file = $request->file('image');
             $img_name = $img_file->getClientOriginalName();
             $img_file->storeAs('public/image/blog', $img_name);
             $blog->image = 'storage/image/blog/'. $img_name;

             //$img_file->storeAs('public/img/service','bc_img.'.$img_file->getClientOriginalExtension());
             //$Services->bc_img = 'storage/img/service/bc_img.'.$img_file->getClientOriginalExtension();
         }
          $blog->update();
         return redirect()->route('admin.blog.list')->with('success', "service updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $destination = $blog->image;
        if(File::exists($destination)){
            File::delete($destination);
        }else{
            return redirect()->route('admin.blog.list')->with('error','Service Field delete');
        }
        $blog->delete();

        return redirect()->route('admin.blog.list')->with('success','Service Deleted Successfully');
    }
}