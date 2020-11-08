@extends('frontend.layout.master')
@section('title','Product Details')
@section('content')

<div class="header__container">
  @include('frontend.include.navbar')
</div>

<!--- Single Product Details -->
<div class="small-container single-product">
  <div class="main__row">
    <div class="main__col-2">
      <img id="ProductImg" src="{{asset('frontend/images/gallery-1.jpg')}}" alt="" width="100%" />

      <div class="small-img-row p-2">
        <div class="small-img-col">
          <img class="small-img" src="{{asset('frontend/images/gallery-1.jpg')}}" alt="" width="100%" />
        </div>
        <div class="small-img-col">
          <img class="small-img" src="{{asset('frontend/images/gallery-2.jpg')}}" alt="" width="100%" />
        </div>
        <div class="small-img-col">
          <img class="small-img" src="{{asset('frontend/images/gallery-3.jpg')}}" alt="" width="100%" />
        </div>
        <div class="small-img-col">
          <img class="small-img" src="{{asset('frontend/images/gallery-4.jpg')}}" alt="" width="100%" />
        </div>
      </div>
    </div>
    <div class="main__col-2">
      
      <p>Home/T-shirt</p>
      <form action="/addCart/" method="POST">
      @csrf
      <h1>{{ $product->product_name }}</h1>
      <h4>${{ $product->product_price }}</h4>
        
        @php
        $size = $product->product_size;
        $arr = explode(',', $size);
        @endphp

        <select name="pro_size" id="pro_size">
          <option>Select Size</option>
          @foreach($arr as $i)

          <option value="{{$i}}">{{$i}}</option>

          @endforeach
        </select>
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}" />
        <input type="number" min="1" value="1" name="qty" id="qty" />
        <div class="col-lg-4" style="padding-left: 0px;">
          <button type="submit" class="main__btn btn-sm text-center">Add To Cart</button>
        </div>
      </form>
      <h3>Product Details<i class="fa fa-indent" aria-hidden="true"></i></h3>
      <br>
      <p>
        {{$product->product_des}}
      </p>
    </div>
  </div>
</div>



<!-- TITLE -->

<div class="small-container">
  <div class="main__row main__row-2">
    <h2>Related Products</h2>
    <p>View More</p>
  </div>
</div>


<!-- Product -->

<div class="small-container">
  <div class="main__row">
    <div class="main__col-4">
      <img src="{{asset('frontend/images/product-9.jpg')}}" alt="" />
      <h4>Red Printed T-Shirt</h4>
      <div class="rating">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star-half-o" aria-hidden="true"></i>
        <i class="fa fa-star-o" aria-hidden="true"></i>
      </div>
      <p>$50.00</p>
    </div>
    <div class="main__col-4">
      <img src="{{asset('frontend/images/product-10.jpg')}}" alt="" />
      <h4>Red Printed T-Shirt</h4>
      <div class="rating">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star-half-o" aria-hidden="true"></i>
        <i class="fa fa-star-o" aria-hidden="true"></i>
      </div>
      <p>$50.00</p>
    </div>
    <div class="main__col-4">
      <img src="{{asset('frontend/images/product-11.jpg')}}" alt="" />
      <h4>Red Printed T-Shirt</h4>
      <div class="rating">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star-half-o" aria-hidden="true"></i>
        <i class="fa fa-star-o" aria-hidden="true"></i>
      </div>
      <p>$50.00</p>
    </div>
    <div class="main__col-4">
      <img src="{{asset('frontend/images/product-12.jpg')}}" alt="" />
      <h4>Red Printed T-Shirt</h4>
      <div class="rating">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star-half-o" aria-hidden="true"></i>
        <i class="fa fa-star-o" aria-hidden="true"></i>
      </div>
      <p>$50.00</p>
    </div>
  </div>
</div>

@endsection

@section('javascript')

<script>

</script>
@endsection



</body>

</html>