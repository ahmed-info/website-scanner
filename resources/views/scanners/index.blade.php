@extends('layouts.user-layout')
@section('content')

            <!-- Masthead-->

            <div class="heading">
                <h1>P R O D U C T &emsp; S L I D E R</h1>
            </div>
            <!--------------------Slider 1------------->
            <div class="heading">
                <h1>{{$cate->name_en}} Scanner</h1>

                {{-- @foreach ( $categories as $category)

                <h1>{{$category->name_en}} Scanner</h1>
                @endforeach --}}
            </div>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                    <a href="{{route('productDetails',["id"=>$product->id])}}">
                    <div class="swiper-slide">
                        <div class="slider-box">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="{{asset($product->image)}}">
                            </div>
                            <div  class="price pb-2">Price {{$product->price}} $</div>
                            <p  class="detail d-block bg-dark w-100 text-white">
                                {{$product->title_en}}
                            </p>
                            <div class="cart">
                                <a href="{{route('productDetails',["id"=>$product->id])}}">More Details</a>
                            </div>
                        </div>
                    </div>
                </a>
                    @endforeach




                </div>
            </div>


@endsection
