@extends('layouts.user-layout')
@section('content')
<!-- Pills navs -->
<section class="bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp'); display:block;">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login</h2>

              <form>


                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="d-flex justify-content-center">
                  <a href="{{route('admin.category.create')}}"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Login</a>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
