@extends('layouts.user')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/css/detail.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="/js/pageDetail.js"></script>
<style>
  .bottom img{
    width: 160px;
    height: 160px;
    }}
</style>
@endsection

@section('content')
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="{{route('page.index')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tank Top T-Shirt</strong></div>
        </div>
      </div>
    </div>  
    
    <div class="site-section">
      <div class="container">
        <div class="row">
		<div class="col-sm-6 details">
					<div class="row imgTop">
						<div class="container imgBox">
								@foreach($product->images as $val)
									<img src='{{asset("/upImage/$val->path")}}' alt="Image" class="img-fluid">
									@break
								@endforeach
						</div>
					</div>
					<div class="container mt-2">
						<div class="row imgBottom">
							@foreach($product->images as $val)
									<div class="card mr-1">
										<a href='{{asset("/upImage/$val->path")}}' target="imgBox"><img class="card-img-top img-fluid" src='{{asset("/upImage/$val->path")}}' alt="Card image cap"></a>
									</div>
								@endforeach
						</div>
					</div>
			</div>


          <div class="col-md-6">
            <h2 class="text-black nameProduct">{{$product['name']}}</h2>
            <p>{{$product->description}}</p>
            <p><strong class="text-primary h4" id="price">{{$product->price}}</strong> VNĐ</p>
            <div class="mb-1 d-flex">
            	@foreach($product->sizes as $value)
              <label  class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" name="size" value="{{$value->id}}" data-name="{{$value->name}}"></span><span class="d-inline-block text-black">{{$value->name}}</span>
              </label>
             	@endforeach
            </div>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
             <!--  <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus nut" type="button">&minus;</button>
              </div> -->
              <input type="text" class="form-control text-center" value="1" disabled aria-label="Example text with button addon" data-id="{{$product->id}}" id="increase" aria-describedby="button-addon1">
              <!-- <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus nut" type="button">&plus;</button>
              </div> -->
            </div>

            </div>
            <!-- <p><button class="btn-success"  id="addToCart">Add To Cart</button></p> -->
            <p><a href="#" id="addToCart" class="btn btn-success">Add To Cart</a></p>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
                @foreach($categoryAll as $value)
                <div class="item">
                  <div class="block-4 text-center bottom">
                    <figure class="block-4-image">
                      @foreach($value->images as $vl)
                        <!-- <a href="http://phpshoes.com/user/showDetail/{{$value->id}}"><img src='{{asset("/upImage/$vl->path")}}' alt="Image placeholder" class="img-fluid"></a> -->

                        <img src='{{asset("/upImage/$vl->path")}}' alt="Image placeholder" class="img-fluid">
                        @break
                      @endforeach
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="#">{{$value->name}}</a></h3>
                      <p class="text-primary font-weight-bold">{{$value->price}}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
		$(document).ready(function(){
			$('.imgBottom a').click(function(e){
				e.preventDefault();
				console.log('alo');
				$('.imgBox img').attr("src",$(this).attr("href"));
			});
		});
	</script>
@endsection