@extends('layouts.master')

@section('title') @lang('translation.Cities') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Settings @endslot
        @slot('title') Cities @endslot
    @endcomponent


    <div>
        SHOW
    </div>

@endsection


@section('script')
    
@endsection
