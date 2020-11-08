@extends('frontend.layout.master')
@section('title', 'Products')
@section('content')
<div class="header__container">
  @include('frontend.include.navbar')
</div>

<!--- All Products -->

<div class="small-container">
  <div class="main__row main__row-2">
    <h2>All Products</h2>
    <select name="" id="">
      <option value="">Default Sorting</option>
      <option value="">Sort by price</option>
      <option value="">Sort by popularity</option>
      <option value="">Sort by rating</option>
      <option value="">Sort by sale</option>
    </select>
  </div>

  <div class="main__row">

    @foreach($products as $product)
    <div class="main__col-4">
      <a href="/productDetails/{{$product->id}}"><img src="{{asset('frontend/images')}}/{{$product->product_img}}" alt="" /></a>
        <h4>{{$product->product_name}}</h4>
        <div class="rating">
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star-half-o" aria-hidden="true"></i>
          <i class="fa fa-star-o" aria-hidden="true"></i>
        </div>
        <p>${{$product->product_price}}</p>
    </div>
    
    @endforeach
  </div>
  <div class="page-btn">
    <span>1</span>
    <span>2</span>
    <span>3</span>
    <span>4</span>
    <span>&#8594;</span>
  </div>
</div>

@endsection
@section('javascript')
<script>
  var MenuItems = document.getElementById("MenuItems");
  MenuItems.style.maxHeight = "0px";

  function menutoggle() {
    if (MenuItems.style.maxHeight == "0px") {
      MenuItems.style.maxHeight = "200px";
    } else {
      MenuItems.style.maxHeight = "0px";
    }
  }
</script>
@endsection