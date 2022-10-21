@extends('layouts.master')

@section('title') @lang('translation.regions') @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Settings @endslot
        @slot('title') Cities @endslot
    @endcomponent

    @if ( Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Update successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
@endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between my-2 align-items-center">
                        <h4 class="card-title">Cites table</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{route('cities.create')}}"  class="btn btn-primary waves-effect waves-light">Create</a>
                        </div>
                    </div>
                    
                    {{-- <p class="card-title-desc">
                        The Buttons extension for DataTables
                        provides a common set of options, API methods and styling to display
                        buttons on a page that will interact with a DataTable. The core library
                        provides the based framework upon which plug-ins can built.
                    </p> --}}

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>NAME Arabic</th>
                                <th>MAIN</th>
                                <th>CREATED AT</th>
                                <th>UPDATED AT</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td class="get_name" >{{$city->name}}</td>
                                    <td>{{$city->name_ar}}</td>
                                    <td>@if ($city->main === 1)
                                       <i class="mdi mdi-check-circle"></i>
                                        @else
                                       <i class="mdi mdi-check-circle-outline"></i>
                                    @endif </td>
                                    <td>{{$city->created_at}}</td>
                                    <td>{{$city->updated_at}}</td>
                                    <td>       
                                        <div class="d-flex flex-wrap gap-2">

                                            <a href="{{ route('cities.edit', $city) }}" class="d-flex align-items-center text-primary gap-1"><i class="bx bx-edit-alt label-icon"></i>Edit</a>
                                            <a href="{{ route('cities.show', $city) }}" class="d-flex align-items-center text-success gap-1"><i class="bx bx-show label-icon"></i>Show</a>

                                            @if(!$city->trashed())
                                            <form method="POST" action="{{ route('cities.destroy', $city) }}" class="d-flex align-items-center">
                                                @method('delete')
                                                @csrf
                                                
                                                <button type="submit" class="border-0 bg-transparent text-danger p-0 d-flex align-items-center gap-1 delete_confirm"><i class="bx bx-trash label-icon"></i><span>Delete</span></button>
                                            </form>
                                            @else
                                            <form method="POST" action="{{ route('cities.force-delete', $city) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="border-0 bg-transparent text-danger p-0 d-flex align-items-center gap-1 force_delete_confirm"><i class="bx bx-trash label-icon"></i><span>Force Delete</span></button>
                                                
                                            </form>

                                            <form method="POST" action="{{ route('cities.restore', $city) }}" class="d-flex align-items-center">
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent text-warning p-0 d-flex align-items-center gap-1 restore_confirm"><i class="bx bx-undo label-icon"></i><span>Restore</span></button>
                                            </form>
                                            @endif
                                                                                
                                    </td>
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

    <script>
         $('.delete_confirm').click(function (e) {
            var form =  $(this).closest("form");
             var name=$(this).closest("tr").find('.get_name').text();
            event.preventDefault();
            Swal.fire({
                title: "Are you sure you want to delete "+name+" City ?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Delete"
            }).then(function (result) {
                if (result.value) {
                    form.submit();
                    Swal.fire("Deleted!", "Your file has been deleted.", "success");
                }
            });    
        });
        
        $('.restore_confirm').click(function (e) {
            var form =  $(this).closest("form");
            var name=$(this).closest("tr").find('.get_name').text();
            event.preventDefault();
            Swal.fire({
                title: "Are you sure you want to restore "+name+" City ?",
                text: "the record will be restored!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Restore"
            }).then(function (result) {
                if (result.value) {
                    form.submit();
                    Swal.fire("Restored!", "Your file has been restored.", "success");
                }
            });    
        });

        $('.force_delete_confirm').click(function (e) {
            var form =  $(this).closest("form");
            var name=$(this).closest("tr").find('.get_name').text();
            event.preventDefault();
            Swal.fire({
                title: "Are you sure do you want delete "+name+" city permanently?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Delete Permanently"
            }).then(function (result) {
                if (result.value) {
                    form.submit();
                    Swal.fire("Delete Permanently!", "Your file deleted permanently.", "success");
                }
            });    
        });
   </script>
@endsection
