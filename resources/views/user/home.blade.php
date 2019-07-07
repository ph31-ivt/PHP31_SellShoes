@extends('layouts.user')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<script src="/js/pageLoad.js"></script>
@endsection

@section('content')
<div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-9 order-2">
            <div class="row mb-5" id="showProduct">
              @foreach($product as $value)
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                  <div class="block-4 text-center border">
                    <figure class="block-4-image">
                      @foreach($value->images as $val)
                        <a href="shop-single.html"><img src='{{asset("/upImage/$val->path")}}' alt="Image placeholder" class="img-fluid"></a>
                        @break
                       @endforeach
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="shop-single.html">{{$value->name}}</a></h3>
                      <p class="text-primary font-weight-bold">{{$value->price}} vnđ</p>
                    </div>
                  </div>
                </div>
              @endforeach
       
            </div>
              <div class="row">
                    <div class="col-12 d-flex justify-content-center" id="pageAdd">
                      {{$product->links()}}
                    </div>
              </div> 
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
                @foreach($category as $value)
                  <li class="mb-1"><a href="#" class="d-flex"><span>{{$value->name}}</span> <span class="text-black ml-auto">(2,220)</span></a></li>
                @endforeach
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                  @foreach($size as $value)
                    <label  class="d-flex">
                      <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">{{$value->name}} (2,319)</span>
                    </label>
                 @endforeach
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
@endsection