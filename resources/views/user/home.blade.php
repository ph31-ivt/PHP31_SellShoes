@extends('layouts.user')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<script src="/js/pageLoad.js"></script>
<style>
  #showProduct img{
    width: 160px;
    height: 160px;
  }
</style>
@endsection

@section('content')
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="container d-flex justify-content-center">
             <form action="" style="width: 600px;">
                @csrf
                <input type="text" class="form-control" name="search" id="search" placeholder="Search...">
            </form>
          </div>
         
        </div>
      </div>
    </div>



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
                        <a href='{{route("showDetail",$value->id)}}'><img src='{{asset("/upImage/$val->path")}}' alt="Image placeholder" class="img-fluid"></a>
                        @break
                       @endforeach
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href='{{route("showDetail",$value->id)}}'>{{$value->name}}</a></h3>
                      <p class="text-primary font-weight-bold mt-2">{{$value->price}} vnđ</p>
                      <a href="{{route('view',$value->id)}}" class="btn btn-info">View</a>
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
                  <li class="mb-1"><a href="#" data-id="{{$value->id}}" class="d-flex category"><span>{{$value->name}}</span></a></li>
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
                <form action="">
                  @csrf
                   @foreach($size as $value)
                    <label  class="d-flex">
                        <input type="radio" id="s_sm" name="checkSize" data-id="{{$value->id}}" class="mr-2 mt-1 size"><span class="text-black">{{$value->name}}</span>
                      </label>
                   @endforeach
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
@endsection