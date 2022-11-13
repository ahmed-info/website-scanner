@extends('layouts.admin-layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create of Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4 mt-3">

                        <div class="form-group col-md-4 mt-3">
                            <label for="category_id"><h6>Select Category</h6></label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="title_en">
                                <h4>Product Title EN</h4>
                            </label>
                            <input type="text" class="form-control" id="title_en" name="title_en"
                                placeholder="Enter Title en*" value="{{old('title_en')}}">
                                @error('title_en')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                        </div>
                        <div class="form-group mb-2">
                            <!-- textarea input-->
                            <label for="description_en">
                                <h4>Description EN</h4>
                            </label>
                            <textarea class="form-control" id="description_en" name="description_en" placeholder="@lang('Your Description en*')"
                                style="height: 112px">{{old('description_en')}}</textarea>
                                @error('description_en')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="price">
                                <h4>Price</h4>
                            </label>
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Enter Price *" value="{{old('price')}}">
                                @error('price')
                                <div class="error">{{ $message }}</div>
                                @enderror
                                
                        </div>
                        <div class="form-group mb-2">
                            <label for="type">
                                <h4>Type</h4>
                            </label>
                            <input type="text" class="form-control" id="type" name="type"
                                placeholder="Enter Type *" value="{{old('model')}}">
                                @error('type')
                                <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="model">
                                <h4>Model</h4>
                            </label>
                            <input type="text" class="form-control" id="model" name="model"
                                placeholder="Enter Model *" value="{{old('model')}}">
                                @error('model')
                                <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="shipping_weight">
                                <h4>Shipping Weight</h4>
                            </label>
                            <input type="text" class="form-control" id="shipping_weight" name="shipping_weight"
                                placeholder="Enter shipping weight *" value="{{old('shipping_weight')}}">
                                @error('shipping_weight')
                                <div class="error">{{ $message }}</div>
                                @enderror
                        </div>

                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <div class="form-group col-md-4 mt-3">
                            <label for="category_id"><h6>اختار القسم</h6></label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">الاقسام</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="title_ar">
                                <h4>Product Title AR</h4>
                            </label>
                            @if (old('gender') == "M") {{ 'selected' }} @endif
                            <input type="text" class="form-control" id="title_ar" name="title_ar"
                                placeholder="Enter Title ar*"  value="{{old('title_ar')}}" >
                                @error('title_ar')
                                    <div class="error">{{ $message }}</div>
                                @enderror 
                        </div>
                        <div class="form-group mb-2">
                            <!-- textarea input-->
                            <label for="description_ar">
                                <h4>Description Ar</h4>
                            </label>
                            <textarea class="form-control" id="description_ar" name="description_ar" placeholder="@lang('Your Description ar*')"
                                style="height: 112px" >{{old('description_ar')}}</textarea>
                                @error('description_ar')
                                <div class="error">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="price_old">
                                <h4>Price old</h4>
                            </label>
                            <input type="number" class="form-control" id="price_old" name="price_old"
                                placeholder="Enter Price old *" value="{{old('price_old')}}">
                                @error('price_old')
                                <div class="error">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="brand">
                                <h4>Brand</h4>
                            </label>
                            <input type="text" class="form-control" id="brand" name="brand"
                                placeholder="Enter Brand *" value="{{old('brand')}}">
                                @error('brand')
                                <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="stock">
                                <h4>Stock</h4>
                            </label>
                            <input type="text" class="form-control" id="stock" name="stock"
                                placeholder="Enter Stock *" value="{{old('stock')}}">
                                @error('stock')
                                <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="shipping_dimensions">
                                <h4>Shipping Dimensions</h4>
                            </label>
                            <input type="text" class="form-control" id="shipping_dimensions" name="shipping_dimensions"
                                placeholder="Enter shipping Dimensions *" value="{{old('shipping_dimensions')}}">
                                @error('shipping_dimensions')
                                <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                        
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <h3>Background Image</h3>
                        <!-- asset('assets/img/header-bg.jpg') -->
                        <img style="height: 30vh" src="{{ asset('storage/image/default.jpg') }}" class="img-thumbnail"
                            alt="">
                        <input type="file" class="mt-3" name="image" id="image">
                        <input type="file" class="mt-3" name="images[]" id="images" multiple>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-1">
            </form>
        </div>
    </main>
@endsection
