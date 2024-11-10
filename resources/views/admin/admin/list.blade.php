@extends('layouts.app')
@section('content')

            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Admin</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Admin
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            
             <div class="col-sm-12" style="text-align:right">
                            <a href="{{ url('admin/admin/add') }}" class="btn btn-primary" style="margin-right: 2% ; margin-bottom:1%"> Add New Admin</a>
                        </div>
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row g-4"> <!--begin::Col-->
                        {{-- <div class="col-12">
                            <div class="callout callout-info">
                             <a href="{{ url('admin/admin/add') }}" target="_blank" rel="noopener noreferrer" class="callout-link">
                                    Admin Add
                                </a> </div>
                        </div> <!--end::Col--> <!--begin::Col--> --}}
                        <div class="col-md-12"> <!--begin::Quick Example-->
                            <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Search User</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form action="" method="get"> <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-3"> <label  class="form-label">Name</label> <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name">
                                            </div>
                                            <div class="mb-3 col-md-3"> <label  class="form-label">Email address</label> <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" aria-describedby="emailHelp">
                                                <div style="color: red">{{ $errors->first('email') }}</div>
                                            </div>
                                            <div class="mb-3 col-md-3"><button class="btn btn-primary" style="margin-top: 30px  " type="submit">Search</button>
                                            <a href="{{ url('admin/admin/list') }}" class="btn btn-success" style="margin-top: 30px" type="submit">Reset</a>
                                            </div>
                                        </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                </form> <!--end::Form-->
                            </div> <!--end::Quick Example--> <!--begin::Input Group-->
  
                        </div> <!--end::Col--> <!--begin::Col-->

                    </div> <!--end::Row-->
                    <div class="row">

                        <div class="col-md-12">

                            @include('_messages')

                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Admin List Total :({{ $getRecord->total() }})</h3>
                                </div> <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                 @foreach ($getRecord as $value )
                                     <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>
                                            <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                     </tr>
                                 @endforeach
                                        </tbody>
                                    </table>                    
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card --> 
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                    <div class="col-sm-12" style="padding: 10px; float: right;">{!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}</div>
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        @stop