@extends('layouts.user-layout')
@section('content')
        <!-- Masthead-->

        <div class="text-blue text-danger" style="height:100px; width:100px; color:blue; display:block">Scanners</div>
   <!----------------------jumbotron----------------------->

   <div class="jumbotron">
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <h4 class="text-center fw-bold pb-4">Reduce the cost and frustration of scanners and document control
            </h4>
            @foreach ($abouts as $about)
            <div class="col-md-4">
                <div class="fw-bold text-center">
                    <div class="bg-featured-blog" style="background-image: url({{$about->image}})"></div>

                </div>

                <h4 class=" fw-bold text-center text-warning">{{$about->title_en}}</h4>
                <p>{{$about->description_en}}</p>
                    <p><a class="btn btn-secondary" href="{{route('aboutDetails',["id"=>$about->id])}}">View details »</a></p>
            </div>
            @endforeach
            

           

        </div>
    </div> <!-- /container -->

</div>


@endsection
