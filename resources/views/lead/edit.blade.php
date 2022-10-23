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
                <h4 class="card-title mb-4">Edit Lead</h4>

                <form action="{{route('leads.update',[$lead->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">City</label>
                        <div class="col-sm-5">
                        <select  class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id">
                        <option value="{{$lead->city_id}}">{{$lead->city->name}}</option>
                            @foreach($city as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                               
                            </select>
                        </div>
                    </div>
                
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Name of bank</label>
                        <div class="col-sm-5">
                           <input type="text" class="form-control @error('name') is-invalid @enderror" id="horizontal-email-input" name="name" value="{{$lead->name}}" placeholder="Enter name of bank">
                           @error('name')<div class="text-danger mt-1" >{{ $message }}</div>@enderror
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Code</label>
                        <div class="col-sm-5">
                           <input type="text" class="form-control @error('code') is-invalid @enderror" id="horizontal-email-input" name="code" value="{{$lead->code}}" placeholder="Enter a code of bank">
                           @error('code')<div class="text-danger mt-1" >{{ $message }}</div>@enderror
                        </div>
                    </div>


                    
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Address</label>
                        <div class="col-sm-5">
                           <input type="text" class="form-control @error('address') is-invalid @enderror" id="horizontal-email-input" name="address" value="{{$lead->address}}" placeholder="Enter a address ">
                           @error('address')<div class="text-danger mt-1" >{{ $message }}</div>@enderror
                        </div>
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