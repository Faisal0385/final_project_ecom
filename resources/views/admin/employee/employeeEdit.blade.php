@extends('admin.layout.master')
@section('title','Employee Edit')
@section('content')

<div class="container">
    <br><br>
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
    <div class="row ">
        <div class="text-center col-lg-12 d-flex justify-content-right ">
            <a href="/admin/employee" class="btn btn-danger btn-sm mb-4">Back</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">

        <div class="modal-dialog model-lg" role="document" style="width: 700px;">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Employee Details</h4>
                </div>
                <div class="modal-body">
                    <form class="text-center p-1 " action="/admin/employee/edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- <input type="hidden" id="pro_id" name="pro_id" class="form-control mb-4" value="{{$data['id']}}" />
                        <input type="text" id="pro_name" name="pro_name" class="form-control mb-4" value="{{$data['product_name']}}" />
                        <select class="browser-default custom-select form-control mb-4" name="pro_cat" id="pro_cat">
                            <option value="{{$data['product_cat']}}">{{$data['product_cat']}}</option>

                        </select>
                        <input type="text" id="pro_size" name="pro_size" class="form-control mb-4" value="{{$data['product_size']}}" />
                        <input type="text" id="pro_price" name="pro_price" class="form-control mb-4" value="{{$data['product_price']}}" />
                        <div class="form-group green-border-focus text-left">
                            <textarea class="form-control" id="pro_des" name="pro_des" rows="3">{{$data['product_des']}}</textarea>
                        </div> -->

                        <div class="row p-2">
                                <input type="hidden" id="employee_id" name="employee_id" class="form-control mb-4" value="{{$data['id']}}" />
                                <input type="text" id="employee_fname" name="employee_fname" class="form-control mb-4" value="{{$data['firstName']}}" />
                                <input type="text" id="employee_lname" name="employee_lname" class="form-control mb-4" value="{{$data['lastName']}}" />
                                <input type="email" id="employee_email" name="employee_email" class="form-control mb-4" value="{{$data['email']}}" />
                                <input type="password" id="employee_password" name="employee_password" class="form-control mb-4" value="{{$data['password']}}" />
                                <input type="text" id="employee_salary" name="employee_salary" class="form-control mb-4" value="{{$data['salary']}}" />
                            
                                <input type="text" id="employee_jtitle" name="employee_jtitle" class="form-control mb-4" value="{{$data['jobTitle']}}"/>
                                <input type="text" id="employee_phone" name="employee_phone" class="form-control mb-4" value="{{$data['phone']}}" />
                                <textarea name="employee_address" id="employee_address" cols="30" rows="5" class="form-control mb-4">{{$data['address']}}</textarea>
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn btn-sm btn-deep-orange">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>



@endsection


@section('javascript')
<script>
    document.getElementById("pro_cat").addEventListener("change", pro_cat());

    function pro_cat() {

        axios.get('/showCat')
            .then(function(response) {
                // handle success
                var data = response.data;

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