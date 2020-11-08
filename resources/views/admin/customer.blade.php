@extends('admin.layout.master')
@section('title','Customer')

@section('content')

<br><br>
<div class="container">
    <h2 class="text-center">Customer List</h2><br>
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
            <table class="table table-hover table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Pic</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $item)

                    <tr>
                        <td>{{ $item->pic }}</td>
                        <td>{{ $item->firstName }}</td>
                        <td>{{ $item->lastName}}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->password }}</td>
                        <td>{{ $item->address }}</td>
                        <td><a href="" class="btn btn-sm btn-warning">Active</a></td>
                        <td><a href="/admin/customer/delete/{{$item->id}}"><i class='fas fa-trash-alt'></i></a></td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection()