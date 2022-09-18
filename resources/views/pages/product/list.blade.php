@extends('layouts.admin-layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Products</li>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="col-sm-1">#</th>
                <th class="col-sm-1">Category</th>
                <th class="col-sm-1">Title En</th>
                <th class="col-sm-1">Tile Ar</th>
                <th class="col-sm-2">Decription En</th>
                <th class="col-sm-2">Description Ar</th>
                <th class="col-sm-1">Image</th>
                <th class="col-sm-1">Price</th>
                <th class="col-sm-2">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($products) > 0)
                    @foreach ($products as $index=> $product)
                        <tr>
                            <th scope="row">{{$index +1}}</th>
                            <td class="col-md-1 mt-3 read-only">
                        
                                <select name="category_id" id="category_id" class="form-control" aria-label="Disabled" disabled>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : ''}} readonly>{{ $category->name_en }}</option>
                                    @endforeach
                                </select>
                            
                        </td>
                            <td>{{$product->title_en}}</td>
                            <td>{{$product->title_ar}}</td>
                            <td>{{$product->description_en}}</td>
                            <td>{{$product->description_ar}}</td>
                            <td><img src="../../../{{ $product->image }}" style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>{{$product->price}}</td>
                            <td>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{route('admin.product.edit',["id"=>$product->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('admin.product.destroy',["id"=>$product->id, "language"=>app()->getLocale()])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

    </div>
</main>
@endsection
