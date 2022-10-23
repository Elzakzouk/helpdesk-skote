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
                <h4 class="card-title mb-4">Lead information </h4>
            
                 
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">City</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-firstname-input"  name="city_id" value="{{$lead->city->name}}"  readonly >
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-email-input" name="name" value="{{$lead->name}}"  readonly >
                        </div>
                    </div>

                           
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Code</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-email-input" name="Code" value="{{$lead->code}}"  readonly >
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">address</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-email-input" name="address" value="{{$lead->address}}"  readonly >
                        </div>
                    </div>


                   

            
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