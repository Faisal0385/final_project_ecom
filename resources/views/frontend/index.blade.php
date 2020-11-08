@extends('frontend.layout.master')
@section('title', 'Home')
@section('content')
<div class="header">
	<div class="header__container">

		@include('frontend.include.navbar')

		<div class="main__row">
			<div class="main__col-2">
				<h1>
					Give Your Workout <br />
					A new Style!
				</h1>
				<p>
					Success isn't always about gretness. It's about consistency.
					Consistent <br />
					hard work gains success. Greatnes will come.
				</p>
				<a href="" class="main__btn">Explore Now &#8594;</a>
			</div>
			<div class="main__col-2">
				<img src="{{asset('frontend/images/image1.png')}}" alt="image1" width="" />
			</div>
		</div>
	</div>
</div>

<!--- featured categories -->
<div class="categories">
	<div class="small-container">
		<div class="main__row">
			<div class="main__col-3">
				<img src="{{asset('frontend/images/category-1.jpg')}}" alt="" />
			</div>
			<div class="main__col-3">
				<img src="{{asset('frontend/images/category-2.jpg')}}" alt="" />
			</div>
			<div class="main__col-3">
				<img src="{{asset('frontend/images/category-3.jpg')}}" alt="" />
			</div>
		</div>
	</div>
</div>

<!--- featured products -->

<div class="small-container">
	<h2 class="title">Featured Products</h2>
	<div class="main__row">

		@foreach($products as $product)
		<div class="main__col-4">
			<a href="/productDetails/{{$product->id}}"><img src="{{asset('/frontend/images')}}/{{$product->product_img}}" alt="" /></a>
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
</div>
<!--- Offers -->
<div class="offer">
	<div class="small-container">
		<div class="main__row">
			<div class="main__col-2">
				<img class="offer-img" src="{{asset('frontend/images/exclusive.png')}}" alt="offer-img">
			</div>
			<div class="main__col-2">
				<p>Exclusively Available on RedStore</p>
				<h1>Smart Band 4</h1>
				<small>
					The Mi Smart Band 4 features a 39.9% larger
					(than Mi Band 3) AMOLED color full-touch display
					adjustable brightness, so everything is clear as can be.
				</small>
				<br>
				<a class="main__btn" href=""> Buy Now &#8594</a>
			</div>
		</div>
	</div>
</div>

<!--- TESTIMONIAL SECTION -->
<div class="testimonial">
	<div class="small-container">
		<div class="main__row">
			<div class="main__col-3">
				<i class="fa fa-quote-left"></i>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
					been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<div class="rating">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</div>
				<img src="{{asset('frontend/images/user-1.png')}}" alt="user image">
				<h3>Sean Parker</h3>
			</div>
			<div class="main__col-3">
				<i class="fa fa-quote-left"></i>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
					been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<div class="rating">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</div>
				<img src="{{asset('frontend/images/user-2.png')}}" alt="user image">
				<h3>Mike Smith</h3>
			</div>
			<div class="main__col-3">
				<i class="fa fa-quote-left"></i>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
					been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<div class="rating">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</div>
				<img src="{{asset('frontend/images/user-3.png')}}" alt="user image">
				<h3>Mebal Joe</h3>
			</div>
		</div>
	</div>
</div>

<!--- BRANDS SECTION -->
<div class="brands">
	<div class="small-container">
		<div class="main__row">
			<div class="main__col-5">
				<img src="{{asset('frontend/images/logo-godrej.png')}}" alt="brands-img">
			</div>
			<div class="main__col-5">
				<img src="{{asset('frontend/images/logo-oppo.png')}}" alt="brands-img">
			</div>
			<div class="main__col-5">
				<img src="{{asset('frontend/images/logo-coca-cola.png')}}" alt="brands-img">
			</div>
			<div class="main__col-5">
				<img src="{{asset('frontend/images/logo-paypal.png')}}" alt="brands-img">
			</div>
			<div class="main__col-5">
				<img src="{{asset('frontend/images/logo-philips.png')}}" alt="brands-img">
			</div>
		</div>
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