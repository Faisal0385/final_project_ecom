@extends('admin.layout.master')
@section('title','Vendor Edit')
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
            <a href="/admin/vendor" class="btn btn-danger btn-sm mb-4">Back</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">

        <div class="modal-dialog model-lg" role="document" style="width: 700px;">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Vendor Details</h4>
                </div>
                <div class="modal-body">
                    <form class="text-center p-1 " action="/admin/vendor/edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" id="vid" name="vid" class="form-control mb-4" value="{{$data['id']}}" />
                                <input type="text" id="companyName" name="companyName" class="form-control mb-4" value="{{$data['companyName']}}" />
                                <input type="text" id="firstName" name="firstName" class="form-control mb-4" value="{{$data['firstName']}}" />
                                <input type="text" id="lastName" name="lastName" class="form-control mb-4" value="{{$data['lastName']}}" />
                                <input type="text" id="phone" name="phone" class="form-control mb-4" value="{{$data['phone']}}" />
                  
                                <input type="email" id="email" name="email" class="form-control mb-4" value="{{$data['email']}}"  />
                                <input type="password" id="password" name="password" class="form-control mb-4" value="{{$data['password']}}"  />
                                <textarea name="address" id="address" cols="30" rows="5" class="form-control mb-4" >{{$data['address']}}</textarea>
                            </div>
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