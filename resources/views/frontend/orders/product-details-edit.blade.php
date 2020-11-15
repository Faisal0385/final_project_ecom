@extends('frontend.layout.master')
@section('title','Product Details')
@section('content')

<div class="header__container">
  @include('frontend.include.navbar')
</div>
<div class="d-flex justify-content-center">
  @if ($errors->any())
  <div class="alert alert-danger ">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  @if(session()->has('msg'))
  <div class="alert alert-success ">
    <ul>
      <li>{{ session()->get('msg') }}</li>
    </ul>
  </div>
  @endif
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
          <option selected value="{{$product->size}}">{{$product->size}}</option>

          @foreach($arr as $i)
            @if($product->size != $i)
            <option value="{{$i}}">{{$i}}</option>
            @endif
          @endforeach
        </select>
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}" />
        <input type="number" min="1" value="1" name="qty" id="qty" />
        <div class="col-lg-4" style="padding-left: 0px;">
          <button type="submit" class="main__btn btn-sm text-center">Update To Cart</button>
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


@endsection

@section('javascript')

<script>

</script>
@endsection



</body>

</html>