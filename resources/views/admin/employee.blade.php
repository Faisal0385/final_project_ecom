@extends('admin.layout.master')
@section('title','Employee')

@section('content')

<br><br>
<div class="container">
    <h2 class="text-center">Employee List</h2>
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
                        <div class="modal-content model-lg">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add Employee Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="text-center p-1 " action="/admin/employee/insert" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" id="employee_fname" name="employee_fname" class="form-control mb-4" placeholder="Employee First Name" />
                                            <input type="text" id="employee_lname" name="employee_lname" class="form-control mb-4" placeholder="Employee Last Name" />
                                            <input type="email" id="employee_email" name="employee_email" class="form-control mb-4" placeholder="Employee Email" />
                                            <input type="password" id="employee_password" name="employee_password" class="form-control mb-4" placeholder="Employee Password" />
                                            <input type="number" min="0" id="employee_salary" name="employee_salary" class="form-control mb-4" placeholder="Employee Salary" />
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" id="employee_jtitle" name="employee_jtitle" class="form-control mb-4" placeholder="Employee Job Title" />
                                            <input type="text" id="employee_phone" name="employee_phone" class="form-control mb-4" placeholder="Employee Phone" />
                                            <textarea name="employee_address" id="employee_address" cols="30" rows="5" class="form-control mb-4" placeholder="Employee Address"></textarea>
                                        </div>
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
                    <a href="" class="btn btn-default btn-sm mb-4" data-toggle="modal" data-target="#modalRegisterForm">Add Employee</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Emp ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Email</th>
                            <th scope="col">PIC</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $item)

                        <tr>
                            <td>{{ $item->Eid }}</td>
                            <td>{{ $item->firstName }}</td>
                            <td>{{ $item->lastName }}</td>
                            <td>{{ $item->jobTitle}}</td>
                            <td>{{ $item->salary }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->pic }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td><a href="/admin/employee/edit/{{$item->id}}"><i class='fas fa-edit'></i></a></td>
                            <td><a href="/admin/employee/delete/{{$item->id}}"><i class='fas fa-trash-alt'></i></a></td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection()