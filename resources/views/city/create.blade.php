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
                <a class="btn btn-success" href="{{route('cities.index')}}">Back</a>
                </div>

    <div class="col-xl-15">
        <div class="card" >
            <div class="card-body">
                <h4 class="card-title mb-4">Create New City</h4>

                <form action="{{route('cities.store') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="horizontal-firstname-input"  name="name" placeholder="Enter name of City  ">
                            @error('name')<div class="text-danger mt-1" >{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Name in Arabic</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="horizontal-email-input" name="name_ar" placeholder="Enter name in arabic">
                            @error('name_ar')<div class="text-danger mt-1" >{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div>
                    <div class="form-check form-switch form-switch-lg mb-5" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg" name="main" value="1" checked>
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