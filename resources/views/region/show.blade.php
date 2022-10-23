@extends('layouts.master')

@section('title')
    @lang('translation.regions')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Settings
        @endslot
        @slot('title')
            Cities
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Region view</h4>

                    <div class="row mb-4">
                        <label for="name" class="col-sm-3 col-form-label">NAME</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" value="{{ $region->name }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="name_ar" class="col-sm-3 col-form-label">NAME AR</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_ar" value="{{ $region->name_ar }}"
                                disabled>
                        </div>
                    </div>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
