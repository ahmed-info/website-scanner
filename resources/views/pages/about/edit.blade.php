@extends('layouts.admin-layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of About</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit About</li>
        </ol>
        <form action="{{route('admin.about.update',["id"=>$about->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-3">
                    <label for="title_en"><h4>Title EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{$about->title_en}}">
                </div>

                <div class="form-group mb-2">
                    <!-- textarea input-->
                    <label for="description_en">
                        <h4>Description En</h4>
                    </label>
                    <textarea class="form-control" id="description_ar" name="description_en" placeholder="@lang('Your Description en*')"
                        style="height: 112px">{{$about->description_en}}</textarea>
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-3">
                    <label for="title_ar"><h4>Title AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{$about->title_ar}}">
                </div>
                <div class="form-group mb-2">
                    <!-- textarea input-->
                    <label for="description_ar">
                        <h4>Description Ar</h4>
                    </label>
                    <textarea class="form-control" id="description_ar" name="description_ar" placeholder="@lang('Your Description ar*')"
                        style="height: 112px">{{$about->description_ar}}</textarea>
                </div>


            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Background Image</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset($about->image)}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="image" id="image">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
