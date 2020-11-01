@extends('admin.layout.master')
@section('title','Category')
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
                        <h4 class="modal-title w-100 font-weight-bold">Add Category Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/insertCat" class="text-center p-1 " method="POST">
                            @csrf
                            <input type="text" id="category_name" name="category_name" class="form-control mb-4" placeholder="Add Category" />
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" name="submit" class="btn btn-deep-orange btn-sm">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="text-center col-lg-12 d-flex justify-content-right ">
            <a href="" class="btn btn-default btn-sm mb-4  " data-toggle="modal" data-target="#modalRegisterForm">Add Category</a>
        </div>
    </div>

    <div class="row d-flex justify-content-right">
        <div class="modal fade" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Edit Category Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="text-center p-1 ">
                            @csrf
                            <input type="hidden" id="cat_id" name="cat_id" class="form-control mb-4" value="" />
                            <input type="text" id="category_edit_name" name="category_edit_name" class="form-control mb-4" value="" />
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" name="submit" id="edit_cat" class="btn btn-deep-orange btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <table id="" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Category Name</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="cat_table">

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
    $(document).ready(function() {
        //To get all the value from the DB 
        //To display in the table
        updateShow();
    });

    //get single id Data to edit 
    function getValue(id) {
        axios.get('/showSingleData/' + id)
            .then(function(response) {
                // handle success
                var data = response.data;
                $("#category_edit_name").val(data[0].category_name);
                $("#cat_id").attr("value", data[0].id);
            })
            .catch(function(error) {
                // handle error
            });
    }

    //Post new edited Data to DB
    function postEditValue(id, event) {

        event.preventDefault();

        var category_edit_name = $("#category_edit_name").val();
        var cat_id = $("#cat_id").val();

        axios.post('/editCat/', {
                category_edit_name: category_edit_name,
                cat_id: cat_id
            })
            .then(function(response) {
                console.log(response.data);
                if (response.data == 1) {

                    $("#category_edit_name").attr("value", '');
                    $("#cat_id").attr("value", '');
                    updateShow();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function updateShow() {
        axios.get('/showCat')
            .then(function(response) {
                // handle success
                var data = response.data;
                $("#cat_table").empty();

                for (var i = 0; i < data.length; i++) {
                    $('<tr>').html(
                        "<th>" + data[i].category_name + "</th>" +
                        "<th><a class='edit_btn' data-id='" + data[i].id + "' ><i class='fas fa-edit'></i></a></th>" +
                        "<th><a href='/deleteCat/" + data[i].id + "'><i class='fas fa-trash-alt'></i></a></th>"
                    ).appendTo('#cat_table');
                }

                $('.edit_btn').click(function() {
                    var id = $(this).data('id');
                    getValue(id);
                    $("#modalEditForm").modal('toggle');
                });

                $('#edit_cat').click(function() {
                    var id = $(this).data('id');
                    $("#modalEditForm").modal('toggle');
                    postEditValue(id, event);
                });

            })
            .catch(function(error) {
                // handle error
            });
    }
</script>
@endsection