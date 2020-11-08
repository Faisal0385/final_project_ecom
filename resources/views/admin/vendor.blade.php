@extends('admin.layout.master')
@section('title','Vendor')

@section('content')

<br><br>
<div class="container">
    <h2 class="text-center">Vendor Details</h2>
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
                                <h4 class="modal-title w-100 font-weight-bold">Add Vendor Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="text-center p-1 " action="/admin/vendor/insert" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">                                            
                                            <input type="text" id="companyName" name="companyName" class="form-control mb-4" placeholder="Company Name" />
                                            <input type="text" id="firstName" name="firstName" class="form-control mb-4" placeholder="First Name" />
                                            <input type="text" id="lastName" name="lastName" class="form-control mb-4" placeholder="Last Name" />
                                            <input type="text" id="phone" name="phone" class="form-control mb-4" placeholder="Phone" />
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="email" id="email" name="email" class="form-control mb-4" placeholder="Email" />
                                            <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password" />                                            
                                            <textarea name="address" id="address" cols="30" rows="5" class="form-control mb-4" placeholder="Employee Address"></textarea>
                                        </div>
                                    </div>



                                    <!-- <input type="text" id="pic"         name="pic"          class="form-control mb-4" placeholder="Pic" /> -->

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
                    <a href="" class="btn btn-default btn-sm mb-4" data-toggle="modal" data-target="#modalRegisterForm">Add Vendor</a>
                </div>
            </div>

            <table class="table table-hover table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Vendor ID</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $item)

                    <tr>                        
                        <td>{{ $item->Vid }}</td>
                        <td>{{ $item->companyName }}</td>
                        <td>{{ $item->firstName}}</td>
                        <td>{{ $item->lastName }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->phone }}</td>
                        <td><a href="/admin/vendor/edit/{{$item->id}}"><i class='fas fa-edit'></i></a></td>
                        <td><a href="/admin/vendor/delete/{{$item->id}}"><i class='fas fa-trash-alt'></i></a></td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection()