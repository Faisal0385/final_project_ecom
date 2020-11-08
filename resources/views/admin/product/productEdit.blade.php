@extends('admin.layout.master')
@section('title','Product Edit')
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
            <a href="/admin/product" class="btn btn-danger btn-sm mb-4" >Back</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">

        <div class="modal-dialog model-lg" role="document" style="width: 700px;">
            <div class="modal-content" >
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Product Details</h4>
                </div>
                <div class="modal-body">
                    <form class="text-center p-1 " action="/admin/product/edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="pro_id" name="pro_id" class="form-control mb-4" value="{{$data['id']}}" />
                        <input type="text" id="pro_name" name="pro_name" class="form-control mb-4" value="{{$data['product_name']}}" />
                        <select class="browser-default custom-select form-control mb-4" name="pro_cat" id="pro_cat">
                            <option value="{{$data['product_cat']}}">{{$data['product_cat']}}</option>

                        </select>
                        <input type="text" id="pro_size" name="pro_size" class="form-control mb-4" value="{{$data['product_size']}}" />
                        <input type="text" id="pro_price" name="pro_price" class="form-control mb-4" value="{{$data['product_price']}}" />
                        <div class="form-group green-border-focus text-left">
                            <textarea class="form-control" id="pro_des" name="pro_des" rows="3">{{$data['product_des']}}</textarea>
                        </div>

                        <!-- <div class="file-field">
                                <div class="btn btn-primary btn-sm float-left">
                                    <span>Choose Images.</span>
                                    <input type="file" name="pro_images" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="pro_images" type="text" placeholder="Select files with extension jpg, jpeg, png only.">
                                </div>
                            </div> -->

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