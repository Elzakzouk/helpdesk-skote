@extends('layouts.master')
@section('title') @lang('translation.Cities') @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection



@section('content')

@component('components.breadcrumb')
    @slot('li_1') Settings @endslot
    @slot('title') Cities @endslot
@endcomponent



<div class="col-xl-15">
        <div class="card" >
            <div class="card-body">
                <h4 class="card-title mb-4">Edit City</h4>

                <form action="{{route('cities.update',[$city->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-firstname-input"  name="name" value="{{$city->name}}" placeholder="Enter name of City  ">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Name in Arabic</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-email-input" name="name_ar" value="{{$city->name_ar}}" placeholder="Enter name in arabic">
                        </div>
                    </div>


                    <div class="form-check form-switch mb-3">
                    <input type="hidden" class="form-control" name="main" value="0" />
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="main" value="1" {{$city->main ||old('main',0)===1 ?'checked':''}} >
                                <label class="form-check-label" for="flexSwitchCheckChecked">
                                    </label>
                            </div>

                    
               

                    <div class="row justify-content-end">
                        <div class="col-sm-8">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

   @endsection
    



         







@section('script')

@endsection