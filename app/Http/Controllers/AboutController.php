<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\File;
class AboutController extends Controller
{
    public function index(){
        return view('scanners.index');
    }
    public function list()
    {
        $abouts = FacadesDB::table('abouts')->orderBy('id', 'desc')->get();
        return view('pages.about.list', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about.create');
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
        $abouts = new About;
        $abouts->title_en = $request->title_en;
        $abouts->title_ar = $request->title_ar;
        $abouts->description_en = $request->description_en;
        $abouts->description_ar = $request->description_ar;

        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = $img_file->getClientOriginalName();
            $img_file->storeAs('public/image/about', $img_name);
            $abouts->image = 'storage/image/about/'. $img_name;
            //$img_file->storeAs('public/img/service','bc_img.'.$img_file->getClientOriginalExtension());
            //$Services->bc_img = 'storage/img/service/bc_img.'.$img_file->getClientOriginalExtension();
        }
         $abouts->save();
        return redirect()->route('admin.about.list')->with('success', "New service created successfully");
    }

    public function show($id)
    {
        $about = About::find($id);
        return view('pages.about.edit', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('pages.about.edit', compact('about'));
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
         $about = About::find($id);
         $about->title_en = $request->title_en;
         $about->title_ar = $request->title_ar;
         $about->description_en = $request->description_en;
         $about->description_ar = $request->description_ar;

         if($request->file('image')){
             $img_file = $request->file('image');
             $img_name = $img_file->getClientOriginalName();
             $img_file->storeAs('public/image/about', $img_name);
             $about->image = 'storage/image/about/'. $img_name;
             //$img_file->storeAs('public/img/service','bc_img.'.$img_file->getClientOriginalExtension());
             //$Services->bc_img = 'storage/img/service/bc_img.'.$img_file->getClientOriginalExtension();
         }
          $about->save();
         return redirect()->route('admin.about.list', app()->getLocale())->with('success', "service updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        $destination = $about->image;
        if(File::exists($destination)){
            File::delete($destination);
        }else{
            return redirect()->route('admin.about.list', app()->getLocale())->with('error','Service Field delete');
        }
        $about->delete();

        return redirect()->route('admin.about.list', app()->getLocale())->with('success','Service Deleted Successfully');
    }
}