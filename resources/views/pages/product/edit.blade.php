@extends('layouts.admin-layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
        </ol>
        <form action="{{route('admin.product.update',["id"=>$product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="form-group col-md-4 mt-3">

                <div class="form-group col-md-4 mt-3">
                    <label for="service_id"><h6>Select Category</h6></label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">---</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name_en }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="title_en"><h4>Title EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{$product->title_en}}">
                </div>

                <div class="form-group mb-2">
                    <!-- textarea input-->
                    <label for="description_en">
                        <h4>Description En</h4>
                    </label>
                    <textarea class="form-control" id="description_ar" name="description_en" placeholder="@lang('Your Description en*')"
                        style="height: 112px">{{$product->description_en}}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="price"><h4>Price</h4></label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group mb-2">
                    <label for="type">
                        <h4>Type</h4>
                    </label>
                    <input type="text" class="form-control" id="type" name="type" value="{{$product->type}}"
                        placeholder="Enter Type *">
                </div>
                <div class="form-group mb-2">
                    <label for="model">
                        <h4>Model</h4>
                    </label>
                    <input type="text" class="form-control" id="model" name="model" value="{{$product->model}}"
                        placeholder="Enter Model *">
                </div>
                <div class="form-group mb-2">
                    <label for="shipping_weight">
                        <h4>Shipping Weight</h4>
                    </label>
                    <input type="text" class="form-control" id="shipping_weight" name="shipping_weight" value="{{$product->shipping_weight}}"
                        placeholder="Enter shipping weight *">
                </div>

            </div>

            <div class="form-group col-md-4 mt-3">
                <div class="form-group col-md-4 mt-3">
                    <label for="service_id"><h6>اختر القسم</h6></label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">---</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name_ar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="title_ar"><h4>Title AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{$product->title_ar}}">
                </div>
                <div class="form-group mb-2">
                    <!-- textarea input-->
                    <label for="description_ar">
                        <h4>Description Ar</h4>
                    </label>
                    <textarea class="form-control" id="description_ar" name="description_ar" placeholder="@lang('Your Description ar*')"
                        style="height: 112px">{{$product->description_ar}}</textarea>
                </div>

                <div class="form-group mb-2">
                    <label for="price_old">
                        <h4>Price old</h4>
                    </label>
                    <input type="number" class="form-control" id="price_old" name="price_old"
                     value="{{$product->price_old}}"   placeholder="Enter Price old *">
                </div>





                <div class="form-group mb-2">
                    <label for="brand">
                        <h4>Brand</h4>
                    </label>
                    <input type="text" class="form-control" id="brand" name="brand" value="{{$product->brand}}"
                        placeholder="Enter Brand *">
                </div>
                <div class="form-group mb-2">
                    <label for="stock">
                        <h4>Stock</h4>
                    </label>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{$product->stock}}"
                        placeholder="Enter Stock *">
                </div>
                <div class="form-group mb-2">
                    <label for="shipping_dimensions">
                        <h4>Shipping Dimensions</h4>
                    </label>
                    <input type="text" class="form-control" id="shipping_dimensions" name="shipping_dimensions" value="{{$product->shipping_dimensions}}"
                        placeholder="Enter shipping Dimensions *">
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Background Image</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset($product->image)}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="image" id="image">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
