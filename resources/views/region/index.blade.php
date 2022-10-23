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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between my-2 align-items-center">
                        <h4 class="card-title">Regions table</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{route('regions.create')}}"  class="btn btn-primary waves-effect waves-light">Create</a>
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
                                <th>NAME AR</th>
                                <th>CREATED AT</th>
                                <th>UPDATED AT</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($regions as $region)
                                <tr>
                                    
                                    <td>{{$region->name}}</td>
                                    <td>{{$region->name_ar}}</td>
                                    <td>{{$region->created_at}}</td>
                                    <td>{{$region->updated_at}}</td>
                                    <td class="d-flex gap-3">
                                        {{-- @can('edit_city') --}}
                                        {{-- <a href="{{route('regions.edit', $region->id)}}" class="btn btn-outline-secondary btn-sm edit edit-btn" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> --}}
                                        {{-- @endcan
                                        @can('view_city') --}}
                                        {{-- <a href="{{route('regions.show', $region->id)}}" class="btn btn-outline-info btn-sm edit" title="View">
                                            <i class="far fa-eye"></i>
                                        </a> --}}
                                        {{-- @endcan
                                        @can('destroy_city') --}}
                                        
                                        <div class="d-flex flex-wrap gap-2">

                                            <a href="{{ route('regions.edit', $region->id) }}" class="d-flex align-items-center text-primary gap-1"><i class="bx bx-edit-alt label-icon"></i>Edit</a>
                                            <a href="{{ route('regions.show', $region->id) }}" class="d-flex align-items-center text-success gap-1"><i class="bx bx-show label-icon"></i>Show</a>


                                            @if(!$region->trashed())
                                            <form method="POST" action="{{ route('regions.destroy', $region) }}" class="d-flex align-items-center">
                                                @method('delete')
                                                @csrf
                                                
                                                <button type="submit" class="border-0 bg-transparent text-danger p-0 d-flex align-items-center gap-1 delete_confirm"><i class="bx bx-trash label-icon"></i><span>Delete</span></button>
                                            </form>
                                            @else
                                            <form method="POST" action="{{ route('regions.forceDelete', $region->id) }}">
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent text-danger p-0 d-flex align-items-center gap-1 force_delete_confirm"><i class="bx bx-trash label-icon"></i><span>Force Delete</span></button>
                                                
                                            </form>

                                            <form method="POST" action="{{ route('regions.restore', $region->id) }}" class="d-flex align-items-center">
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
             var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
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
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
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

        $('.forceDelete_confirm').click(function (e) {
            var form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
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
