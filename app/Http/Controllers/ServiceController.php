<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;
class ServiceController extends Controller
{
    public function change_locale($locale)
    {
        try{
            if(array_key_exists($locale, config('locale.languages'))){
                App::setlocale($locale);
                Lang::setlocale($locale);
                Session::put('locale',$locale);
                Carbon::setlocale($locale);
            }
            return redirect()->back();
        }catch(Exception $ex){
            return redirect()->back();
        }
    }

    function changeLang($langcode){
    
        App::setLocale($langcode);
        session()->put("lang_code",$langcode);
        return view('mylangtest');
    } 
}