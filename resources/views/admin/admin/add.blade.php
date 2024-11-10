@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Add Admin</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Admin Add
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="col-sm-12" style="text-align:right">
                <a href="{{ url('admin/admin/list') }}" class="btn btn-primary" style="margin-right: 2% ; margin-bottom:1%">View Admin List</a>
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
                                    <div class="card-title">Add Admin Details</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form action="" method="post"> <!--begin::Body-->
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="mb-3"> <label  class="form-label">Name</label> <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                                        </div>
                                        <div class="mb-3"> <label  class="form-label">Email address</label> <input type="email" class="form-control" name="email" value="{{ old('email') }}" required aria-describedby="emailHelp">
                                            <div style="color: red">{{ $errors->first('email') }}</div>
                                        </div>
                                        <div class="mb-3"> <label class="form-label">Password</label> <input type="password" class="form-control" name="password" required> </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div> <!--end::Quick Example--> <!--begin::Input Group-->
  
                        </div> <!--end::Col--> <!--begin::Col-->

                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->

@stop