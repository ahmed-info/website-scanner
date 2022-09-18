@extends('layouts.admin-layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create of Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('admin.category.store', app()->getLocale())}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="form-group col-md-4 mt-3">


                <div class="form-group mb-5">
                    <label for="title"><h4>Category EN</h4></label>
                    <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Enter Category en*">
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">

                <div class="form-group mb-5">
                    <label for="name_ar"><h4>Category AR</h4></label>
                    <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="Enter Category ar*">
                </div>


            </div>

            <div class="form-group col-md-3 mt-3">
                <h3>Background Image</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset('storage/image/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="image" id="image">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
