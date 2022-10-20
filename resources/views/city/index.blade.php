@extends('layouts.master')

@section('title') @lang('translation.Cities') @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
    @slot('li_1') Settings @endslot
    @slot('title') Cities @endslot
@endcomponent



@if ( Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
                        updated successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
@endif


    @if ( Session::has('delete'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
                        deleted successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
    @endif

    <div style="padding-left:93%;padding-bottom:30px;">
                <a class="btn btn-success" href="{{route('cities.create')}}">New City</a>
                </div>

                <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                <!-- start drop menu  -->
                <div class="col-sm-6" style=" padding-left:95%;padding-bottom:5px;">
                        <div class="dropdown mt-4 mt-sm-0">
                            <a href="#" class="btn btn-link dropdown-toggle" style="font-size: 24px;" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-filter-outline"></i>
                            </a>

                            <div class="dropdown-menu">
                 
                                <a class="dropdown-item" href="{{url('archive')}}">Deleted Record</a>
                            
                           
                               <a class="dropdown-item" href="{{route('cities.index')}}">Recored</a>
                            </div>
                    
                        </div>
                    
                    </div>
                

    <!-- start of table -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title"></h4>
                    <p class="card-title-desc">
                    </p>

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Name_ar</th>
                                <th>Main</th>
                                <th>update_at</th>
                                <th>create_at</th>
                                <th>Update</th>
                                <th>Delete</th>
                                <th>view</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($cities as $city)
                            <tr>
                                <td>{{$city->name}} </td>
                                <td>{{$city->name_ar}}</td>
                                <td>@if ($city->main === 1)
                                <i class="mdi mdi-check-circle"></i>
                                    @else
                                <i class="mdi mdi-check-circle-outline"></i>
                                    @endif </td>
                                <td>{{$city->updated_at}}</td>
                                <td>{{$city->created_at}}</td>
                                <td><a class="btn btn-link" href="{{route('cities.edit',[$city->id])}}"><i class="mdi mdi-pencil"></i>Edit</a></td>
                                <td><form action="{{route('cities.destroy',[$city -> id])}}" method="POST">
                               @csrf
                               @method('DELETE')
                               <button class="Confirm-button btn btn-link" style = "color: red" type="submit"> <i class="mdi mdi-trash-can-outline "></i>Delete</button>
                            </form></td>
                            <td><a class="btn btn-link" href="{{route('cities.show',[$city->id])}}">view</a></td>
                           

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->











@endsection





@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>

    <!-- Sweet Alerts js -->
<script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js') }}"></script>


@endsection