@extends('layouts.admin-layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
        </ol>
        <form action="{{route('admin.category.update',["id"=>$category->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-3">
                    <label for="depart_en"><h4>Category EN</h4></label>
                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{$category->name_en}}">
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-3">
                    <label for="name_ar"><h4>Category AR</h4></label>
                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{$category->name_ar}}">
                </div>



            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Background Image</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset($category->image)}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="image" id="image">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
