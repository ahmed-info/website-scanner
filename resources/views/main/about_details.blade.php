@extends('layouts.user-layout')
@section('content')
<div style="height: 100px; width:100%;"></div>
<div class="container" style="display:block;">
    <h1 class="text-center fw-bold">{{$about->title_en}}</h1>
    <h4 class="text-center py-3">{{$about->created_at}}</h4>
    <div class="col-md-12" style="display:block;">
        <div class="fw-bold text-center" style="display:block;">
            <div class="bg-featured-blog d-block" style="background-image: url(../{{$about->image}});display:block;height:400px">
            </div>
        </div>
    </div>
    <div class="p-4 description">
        {{$about->description_en}}
    </div>
</div>
@endsection
