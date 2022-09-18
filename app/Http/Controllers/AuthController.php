<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
use DB;
use App\Models\Blog;
use Illuminate\Support\Facades\DB as FacadesDB;
class AuthController extends Controller
{
    public function Register(Type $var = null)
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }
    public function Login()
    {
        $categories = Category::all();
        return view('auth.login', compact('categories'));
    }
}