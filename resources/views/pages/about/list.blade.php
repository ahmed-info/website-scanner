@extends('layouts.admin-layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Abouts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Abouts</li>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="col-sm-1">#</th>
                <th class="col-sm-1">Title En</th>
                <th class="col-sm-1">Tile Ar</th>
                <th class="col-sm-3">Decription En</th>
                <th class="col-sm-3">Description Ar</th>
                <th class="col-sm-1">Image</th>
                <th class="col-sm-2">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($abouts) > 0)
                    @foreach ($abouts as $index=> $about)
                        <tr>
                            <th scope="row">{{$index +1}}</th>
                            <td>{{$about->title_en}}</td>
                            <td>{{$about->title_ar}}</td>
                            <td>{{$about->description_en}}</td>
                            <td>{{$about->description_ar}}</td>
                            <td><img src="../../../{{ $about->image }}" style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{route('admin.about.edit',["id"=>$about->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('admin.about.destroy',["id"=>$about->id, "language"=>app()->getLocale()])}}" method="POST">
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
