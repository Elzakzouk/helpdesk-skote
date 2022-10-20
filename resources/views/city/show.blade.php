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
                <h4 class="card-title mb-4">City information </h4>
            
                 
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-firstname-input"  name="name" value="{{$city->name}}"  readonly >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Name in Arabic</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-email-input" name="name_ar" value="{{$city->name_ar}}"  readonly >
                        </div>
                    </div>


                    <div class="form-check form-switch form-switch-lg mb-5" dir="ltr" >
                    <input type="hidden" class="form-control" name="main" value="0" />
                                <input class="form-check-input"  type="checkbox" id="flexSwitchCheckChecked" name="main" value="1" {{$city->main ||old('main',0)===1 ?'checked':''}} >
                                <label class="form-check-label" for="flexSwitchCheckChecked">
                                    </label>
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