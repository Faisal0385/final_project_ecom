@extends('frontend.layout.master')
@section('title', 'Orders')
@section('content')

@include('frontend.include.navbar')

<div class="header__container">
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

  <!-- Cart Item Details -->
  <div class="small-container cart-page">
    <table>
      <tr>
        <th>Product</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>
      @foreach($data as $item)
      <tr>
        <td>
          <div class="cart-info">
            <img src="{{asset('frontend/images/buy-1.jpg')}}" alt="" />
            <div>
              <p>{{$item->product_name}}</p>
              <small>Price: <strong>${{$item->product_price}}</strong> </small><br>
              <a href="/removeCart/{{$item->id}}">Remove</a>
            </div>
          </div>
        </td>
        
        <td>
          <div class="col-md-3">
            <form action="/updateQty" method="post">
              @csrf
              <input type="hidden" name="id" value={{$item->id}}>
              <input type="number" class="form-control" name="qty" min="1" value="{{$item->qty}}" />
              <button type="submit" class="btn btn-outline-warning waves-effect btn-sm">Update</button>
            </form>
            <a href="/productDetailsEdit/{{$item->carts_id}}">Edit</a>
          </div>
        </td>
        <td>$<span class="SubPrice">{{$item->qty * $item->product_price}}</span></td>
      </tr>
      @endforeach


    </table>

    <div class="total-price">
      <table>
        <tr>
          <td>Subtotal</td>
          <td>$<span id="subTotal"></span></td>
        </tr>
        <tr>
          <td>Tax</td>
          <td>$<span id="tax">35</span></td>
        </tr>
        <tr>
          <td>Total</td>
          <td>$<span id="total"></span></td>
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection