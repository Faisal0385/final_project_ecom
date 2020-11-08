@extends('admin.layout.master')
@section('title','Order')

@section('content')

<br><br>
<div class="container">
    <h2 class="text-center">Order Details</h2><br>
    <div class="row">
        <div class="col-lg-12 text-center ">
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
            <div class="row d-flex justify-content-right">
                <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add Order Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="text-center p-1 " action="/insertPur" method="POST">
                                    @csrf
                                    <!-- <input type="text" id="pro_name" name="pro_name" class="form-control mb-4" placeholder="Product Name" /> -->
                                    <select class="browser-default custom-select form-control mb-4" name="pur_pro" id="pur_pro">
                                        <option value="1"> Select Product </option>

                                    </select>
                                    <select class="browser-default custom-select form-control mb-4" name="pur_ven" id="pur_ven">
                                        <option value="2"> Select Vendor </option>

                                    </select>
                                    <select class="browser-default custom-select form-control mb-4" name="pur_by" id="pur_by">
                                        <option value="3"> Select Purchase By </option>

                                    </select>
                                    <input type="text" id="pro_price" name="pro_price" class="form-control mb-4" placeholder="Price" />
                                    <input type="number" min="1" id="pro_qty" name="pro_qty" class="form-control mb-4" placeholder="Quantity" />
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="submit" name="submit" class="btn btn-sm btn-deep-orange">Add</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- <div class="row ">
                <div class="text-center col-lg-12 d-flex justify-content-right ">
                    <a href="" class="btn btn-default btn-sm mb-4" data-toggle="modal" data-target="#modalRegisterForm">Add Order</a>
                </div>
            </div>
            <br> -->

            <table class="table table-hover table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sub</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Total</th>
                        <th scope="col">Sold By</th>
                        <th scope="col">Sold Date</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $item)

                    <tr>
                        <td>{{ $item->pid }}</td>
                        <td>{{ $item->cid }}</td>
                        <td>{{ $item->price}}</td>
                        <td>{{ $item->sub }}</td>
                        <td>{{ $item->tax }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->sold_by }}</td>
                        <td>{{ $item->sold_date }}</td>                        
                        <td><a href="/admin/order/delete/{{$item->id}}"><i class='fas fa-trash-alt'></i></a></td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection()