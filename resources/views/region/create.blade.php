
@extends('layouts.master')

@section('title') @lang('translation.regions') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Settings @endslot
        @slot('title') Cities @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Region create</h4>
                    
                    <form method="POST" action="{{ route('regions.store') }}">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-sm-3 col-form-label">NAME</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter region name" value="{{ old('name') }}">
                                @error('name')<div class="text-danger mt-1" id="passwordError">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name_ar" class="col-sm-3 col-form-label">NAME AR</label>
                            <div class="col-sm-9">
                                <input type="text" name="name_ar" class="form-control @error('name') is-invalid @enderror" id="name_ar" placeholder="Enter region name AR" value="{{old('name_ar')}}">
                                @error('name_ar')<div class="text-danger mt-1" id="passwordError">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
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

@endsection


@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection