@extends('layouts.user-layout')
@section('content')
    <!-- Masthead-->
    <div class="heading">
        <h1>P R O D U C T &emsp; S L I D E R</h1>
    </div>
    <!--------------------Slider 1------------->
    {{-- <div class="col-12" style="margin:0px; padding:0px;">
        <div class="mybox col-sm-3 col-md-3 w-100" style="margin:0px; padding:0px;">
            <img src="{{ asset('storage/image/product/dr-s150.png') }}">
        </div>
        <div class="mybox col-sm-3 col-md-3 w-100" style="margin:0px; padding:0px;">
            <img src="{{ asset('storage/image/product/dr-s150.png') }}">

        </div>
        <div class="mybox col-sm-3 col-md-3 w-100" style="margin:0px; padding:0px;">
            <img src="{{ asset('storage/image/product/dr-s150.png') }}">

        </div>
    </div> --}}


    @foreach ($categories as $category)
        <div class="heading">
            <h1> {{  $category->name_en }} </h1>
        </div>



        <div class="swiper-container">
            <div class="swiper-wrapper">

                @foreach ($products as $product)
                    @if ($category->id == $product->category_id)
                        <a href="{{ route('productDetails', ['id' => $product->id]) }}">
                            <div class="swiper-slide">
                                <div class="slider-box">
                                    <p class="time">@lang('messages.New')</p>
                                    <div class="img-box">
                                        <img src="{{ asset($product->image) }}">
                                    </div>
                                    <div class="price pb-2">Price {{ $product->price }} $</div>
                                    <p class="detail bg-dark w-100 h-40 text-white" style="width:100%">
                                        {{ $product->title_en }}
                                    </p>
                                    <div class="cart">
                                        <a
                                            href="{{ route('productDetails', ['id' => $product->id]) }}">@lang('messages.MoreDetails')</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach




            </div>
        </div>
    @endforeach
@endsection
