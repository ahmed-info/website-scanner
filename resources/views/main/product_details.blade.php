@extends('layouts.user-layout')
@section('content')
<div style="height: 100px; width:100%;"></div>
<div class="container" style="display:block;">
    <h1 class="text-center fw-bold">{{$product->title_en}}</h1>
    <h4 class="text-center py-3">{{$product->created_at}}</h4>
    {{-- <div class="col-md-3" style="display:block;">
        <div class="fw-bold text-center" style="display:block;">
            <div class="bg-featured-blog d-block" style="background-image: url(../{{$product->image}});display:inline-block;height:100%">
            </div>
        </div>
    </div> --}}



      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="{{asset($product->image)}}" class="product-image" alt="Product Image">
              </div>


              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active">
                    <img src="{{asset($product->image)}}" alt="Product Image">

                </div>

                
                @foreach ($images as $image)
                <div class="product-image-thumb" >
                    <img src="{{asset($image->image)}}" alt="Product Image">
                </div>
                @endforeach
                
                
              </div>


            </div>
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Details Product</h4>

                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">


                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover table-bordered text-nowrap">

                        <tbody>
                          <tr>
                            <th width="35%">Type</th>
                            <td>{{$product->type}}</td>
                          </tr>
                          <tr>
                            <th width="35%">Brand</th>
                            <td>{{$product->brand}}</td>
                          </tr>
                          <tr>
                            <th width="35%">Model</th>
                            <td>{{$product->model}}</td>
                          </tr>
                          <tr>
                            <th width="35%">Stock</th>
                            <td>{{$product->stock}}</td>
                          </tr>
                          <tr>
                            <th width="35%">Create at</th>
                            <td>{{$product->created_at}}</td>
                          </tr>
                          <tr>
                            <th width="35%">Shipping Weight</th>
                            <td>{{$product->shipping_weight}}</td>
                          </tr>
                          <tr>
                            <th width="35%">Shipping Dimensions</th>
                            <td>{{$product->shipping_dimensions}}</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>



          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                {{$product->{'description_en'} }}
            </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


    <div class="p-4 description">
        {{$product->description_en}}
    </div>
</div>
@endsection
