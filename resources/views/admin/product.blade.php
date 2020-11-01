@extends('admin.layout.master')
@section('title','Product')
@section('content')


<div class="container">
    <br>
    <br>
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
                        <h4 class="modal-title w-100 font-weight-bold">Add Product Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="text-center p-1 " action="/insertPro" method="POST">
                            @csrf
                            <input type="text" id="pro_name" name="pro_name" class="form-control mb-4" placeholder="Product Name" />
                            <select  class="browser-default custom-select form-control mb-4" name="pro_cat" id="pro_cat">
                            <option > Select Category </option>

                            </select>
                            <input type="text" id="pro_size" name="pro_size" class="form-control mb-4" placeholder="Size" />
                            <input type="text" id="pro_price" name="pro_price" class="form-control mb-4" placeholder="Price" />
                            <div class="form-group green-border-focus text-left">
                                <label for="product description ">Product Description</label>
                                <textarea class="form-control" id="pro_des" name="pro_des" rows="3"></textarea>
                            </div>
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
            <a href="" class="btn btn-default btn-sm mb-4" data-toggle="modal" data-target="#modalRegisterForm">Add Product</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table id="" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Product Image</th>
                        <th class="th-sm">Product Name</th>
                        <th class="th-sm">Product Price</th>
                        <th class="th-sm">Product Size</th>
                        <th class="th-sm">Product Category</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="pro_table">

                </tbody>
            </table>
        </div>
    </div>


</div>
</div>
</div>


@endsection

@section('javascript')
<script>
    // Material Select Initialization
    $(document).ready(function() {
        // $('.mdb-select').materialSelect();


        //To get all the value from the DB 
        //To display in the table
        updateShow();
    });
    // $(document).ready(function() {


    // });
    function updateShow() {
        axios.get('/showPro')
            .then(function(response) {
                // handle success
                var data = response.data;
                $("#pro_table").empty();

                for (var i = 0; i < data.length; i++) {
                    $('<tr>').html(
                        "<th>" + data[i].product_img + "</th>" +
                        "<th>" + data[i].product_name + "</th>" +
                        "<th>" + data[i].product_price + "</th>" +
                        "<th>" + data[i].product_size + "</th>" +
                        "<th>" + data[i].product_cat + "</th>" +
                        "<th><a class='edit_btn' data-id='" + data[i].id + "' ><i class='fas fa-edit'></i></a></th>" +
                        "<th><a href='/deletePro/" + data[i].id + "'><i class='fas fa-trash-alt'></i></a></th>"
                    ).appendTo('#pro_table');
                }

                // $('.edit_btn').click(function() {
                //     var id = $(this).data('id');
                //     getValue(id);
                //     $("#modalEditForm").modal('toggle');
                // });

                // $('#edit_cat').click(function() {
                //     var id = $(this).data('id');
                //     $("#modalEditForm").modal('toggle');
                //     postEditValue(id, event);
                // });

            })
            .catch(function(error) {
                // handle error
            });
    }


    document.getElementById("pro_cat").addEventListener("change", pro_cat() );
    
    function pro_cat() {

        console.log("kasdhfksd");
        axios.get('/showCat')
            .then(function(response) {
                // handle success
                var data = response.data;

                console.log(data);

                for (var i = 0; i < data.length; i++) {
                    $('#pro_cat').append(
                        `<option value="${data[i].id}"> ${data[i].category_name} </option>`
                    );
                    // '<option value="' + data[i].id + '">' + data[i].category_name + '</option>'

                }
            })
            .catch(function(error) {
                // handle error
            });
    }
</script>
@endsection