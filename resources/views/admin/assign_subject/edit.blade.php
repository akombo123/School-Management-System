@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Assign Subject Edit</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Assign Subject Edit
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="col-sm-12" style="text-align:right">
                <a href="{{ url('admin/class_subject/list') }}" class="btn btn-primary" style="margin-right: 2% ; margin-bottom:1%">Assign Subject List</a>
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
                                    <div class="card-title">Assign Subject Details</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form action="" method="post"> <!--begin::Body-->
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="mb-3"> <label  class="form-label">Name</label>
                                            <select class="form-control" name="class_id" >
                                                <option value="">-- Class Name --</option>
                                                 @foreach ($getClass as $class )
                                                 <option {{( $getRecord->class_id == $class->id ) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                     
                                                 @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3"> <label  class="form-label">Subject Name</label>
                                            
                                                 @foreach ($getSubject as $subject )

                                                 @php
                                                     $checked = "";
                                                 @endphp

                                                 @foreach ($getAssignSubjectID as $subjectAssign )
                                                     @if ($subjectAssign && $subjectAssign->id === $subject->id)
                                                     @php
                                                     $checked = "checked";
                                                      @endphp 
                                                     @endif
                                                 @endforeach
                                                 
                                                <div>
                                                    <label >
                                                    <input type="checkbox"  {{ $checked }} value="{{ $subject->id }}" name="subject_id[]"> {{ $subject->name }}
                                                </label>
                                                </div>
                                                     
                                                 @endforeach
                                          
                                        </div>

                                        <div class="mb-3"> <label  class="form-label">Status</label>
                                            <select class="form-control" name="status" >
                                                <option {{( $getRecord->status == 0 ) ? 'selected' : '' }} value="0">Active</option>
                                                <option {{( $getRecord->status == 1 ) ? 'selected' : '' }} value="1">Inactive</option>
                                            </select>
                                        </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div> <!--end::Quick Example--> <!--begin::Input Group-->
  
                        </div> <!--end::Col--> <!--begin::Col-->

                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->

@stop