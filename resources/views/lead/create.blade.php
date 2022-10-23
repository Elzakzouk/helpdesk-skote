@extends('layouts.master')

@section('title') @lang('translation.Cities') @endsection

@section('content')

@component('components.breadcrumb')
    @slot('li_1') Settings @endslot
    @slot('title') Cities @endslot
@endcomponent

@if ( Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Created successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
@endif

<div style="padding-left:95%;padding-bottom:30px;">
                <a class="btn btn-success" href="{{route('leads.index')}}">Back</a>
                </div>

    <div class="col-xl-15">
        <div class="card" >
            <div class="card-body">
                <h4 class="card-title mb-4">Create New Lead</h4>

                <form action="{{route('leads.store') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">City</label>
                        <div class="col-sm-5">
                            <select  class="form-control @error('city') is-invalid @enderror" id="city_id" name="city_id">
                            <option value="">Select a City</option>
                            @foreach($city as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                            </select>
                            @error('city')<div class="text-danger mt-1" >{{ $message }}</div>@enderror
                        </div>
                    </div>




                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">Name of Bank</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="horizontal-firstname-input"  name="name" placeholder="Enter name of City  ">
                            @error('name')<div class="text-danger mt-1" >{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Code</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('code') is-invalid @enderror" id="horizontal-email-input" name="code" placeholder="Enter a code of bank">
                            @error('code')<div class="text-danger mt-1" >{{ $message }}</div>@enderror
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Address</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="horizontal-email-input" name="address" placeholder="Enter  address">
                            @error('address')<div class="text-danger mt-1" >{{ $message }}</div>@enderror
                        </div>
                    </div>
               

                    <div class="row justify-content-end">
                        <div class="col-sm-8">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
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