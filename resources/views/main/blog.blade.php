@extends('layouts.user-layout')
@section('content')
        <!-- Masthead-->
        <main class="pb-5">

        </main>
        @foreach ($blogs as $blog)
        <section class="py-5 mt-3" id="##">
            <div class="container px-5" style="text-align: left">
                <div class="card border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row gx-0">
                            <div class="col-lg-6 col-xl-6">
                                <div class="p-md-5">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2" style="text-align: center">News</div>
                                    <div class="h4 fw-bolder">{{$blog->title_.session()->get('locale')}}</div>

                                        <h5 id="check-li">{{$blog->description_.session()->get('locale')}}</h5>
                                    {{-- {{route('portfolio', app()->getLocale())}}#{{ucfirst($service->{'depart_'.app()->getLocale() }) }} --}}

                                </div>
                            </div>
                            {{-- {{asset($service->bc_img)}} --}}
                            <div class="col-lg-6 col-xl-6">
                                <div class="bg-featured-blog" style="background-image: url({{$blog->image}})"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach


@endsection
