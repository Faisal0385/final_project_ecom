@extends('admin.layout.master')
@section('title','Purchase')

@section('content')

<br><br>
<div class="container">
    <h2 class="text-center">Purchase Details</h2>
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
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add Purchase Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="text-center p-1 " action="/admin/purchase/insert" method="POST">
                                    @csrf
                                    <!-- <input type="text" id="pro_name" name="pro_name" class="form-control mb-4" placeholder="Product Name" /> -->
                                    <select class="browser-default custom-select form-control mb-4" name="pur_pro" id="pur_pro">
                                        <option> Select Product </option>

                                    </select>
                                    <select class="browser-default custom-select form-control mb-4" name="pur_ven" id="pur_ven">
                                        <option> Select Vendor </option>

                                    </select>
                                    <select class="browser-default custom-select form-control mb-4" name="pur_by" id="pur_by">
                                        <option> Select Purchase By </option>

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

            <div class="row ">
                <div class="text-center col-lg-12 d-flex justify-content-right ">
                    <a href="" class="btn btn-default btn-sm mb-4" data-toggle="modal" data-target="#modalRegisterForm">Add Purchase</a>
                </div>
            </div>

            <table class="table table-hover table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Vendor ID</th>
                        <th scope="col">Purchase By</th>
                        <th scope="col">Price</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Purchase Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $item)

                    <tr>
                        <td>{{ $item->pid }}</td>
                        <td>{{ $item->vid }}</td>
                        <td>{{ $item->purchase_by}}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->purchase_date }}</td>
                        <td><a href="" class="btn btn-sm btn-warning">Active</a></td>
                        <td><a href="/admin/purchase/delete/{{$item->id}}"><i class='fas fa-trash-alt'></i></a></td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

@section('javascript')
<script>

    //get the data from the product info from db
    document.getElementById("pur_pro").addEventListener("change", pur_pro());

    function pur_pro() {

        axios.get('/admin/product/showAll')
            .then(function(response) {

                // handle success
                var data = response.data;
                console.log(data);

                for (var i = 0; i < data.length; i++) {

                    $('#pur_pro').append(`<option value="${data[i].id}"> ${data[i].product_name} </option>`);

                }
            })
            .catch(function(error) {
                // handle error
            });
    }

    //get the data from the Vendor info from db
    document.getElementById("pur_ven").addEventListener("change", pur_ven());

    function pur_ven() {

        axios.get('/admin/vendor/showAll')
            .then(function(response) {
                
                // handle success
                var data = response.data;

                for (var i = 0; i < data.length; i++) {

                    $('#pur_ven').append(`<option value="${data[i].id}"> ${data[i].companyName} </option>`);

                }
            })
            .catch(function(error) {
                // handle error
            });
    }

    //get the data from the purchase info from db
    document.getElementById("pur_by").addEventListener("change", pur_by());

    function pur_by() {

        axios.get('/admin/employee/showAll')
            .then(function(response) {
                
                // handle success
                var data = response.data;
                // console.log(data);

                for (var i = 0; i < data.length; i++) {

                    $('#pur_by').append(`<option value="${data[i].id}"> ${data[i].firstName} ${data[i].lastName}</option>`);

                }
            })
            .catch(function(error) {
                // handle error
            });
    }

</script>
@endsection