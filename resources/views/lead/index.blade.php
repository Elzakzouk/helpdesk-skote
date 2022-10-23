@extends('layouts.master')

@section('title') @lang('translation.regions') @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


@if ( Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
                        updated successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
@endif

    @component('components.breadcrumb')
        @slot('li_1') Settings @endslot
        @slot('title') Cities @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between my-2 align-items-center">
                        <h4 class="card-title">Leads table</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{route('leads.create')}}"  class="btn btn-primary waves-effect waves-light">Create</a>
                        </div>
                    </div>
                    
                     <p class="card-title-desc">
           
                    </p> 

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>CITY</th>
                                <th>NAME</th>
                                <th>CODE</th>
                                <th>ADDRESS</th>
                                <th>UPDATED AT</th>
                                <th>CREATE AT</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                        @foreach ($leads as $lead)
                                <tr>
                                    <td>{{$lead->city->name}}</td>
                                    <td class="get_name">{{$lead->name}}</td>
                                    <td>{{$lead->code}}</td>
                                    <td>{{$lead->address}}</td>
                                    <td>{{$lead->updated_at}}</td>
                                    <td>{{$lead->created_at}}</td>
                                    <td>       
                                        <div class="d-flex flex-wrap gap-2">

                                            <a href="{{ route('leads.edit', $lead->id) }}" class="d-flex align-items-center text-primary gap-1"><i class="bx bx-edit-alt label-icon"></i>Edit</a>
                                            <a href="{{ route('leads.show', $lead->id) }}" class="d-flex align-items-center text-success gap-1"><i class="bx bx-show label-icon"></i>Show</a>

                                            @if(!$lead->trashed())
                                            <form method="POST" action="{{ route('leads.destroy', $lead) }}" class="d-flex align-items-center">
                                                @method('delete')
                                                @csrf
                                                
                                                <button type="submit" class="border-0 bg-transparent text-danger p-0 d-flex align-items-center gap-1 delete_confirm"><i class="bx bx-trash label-icon"></i><span>Delete</span></button>
                                            </form>
                                            @else
                                            <form method="POST" action="{{route('leads.force-delete',$lead)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="border-0 bg-transparent text-danger p-0 d-flex align-items-center gap-1 force_delete_confirm"><i class="bx bx-trash label-icon"></i><span>Force Delete</span></button>
                                                
                                            </form>

                                            <form method="POST" action="{{route('leads.restore',$lead)}}" class="d-flex align-items-center">
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
                title: "Are you sure you want to delete "+name+" bank",
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
                title: "Are you sure you want to restore "+name+" Bank ?",
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
                title: "Are you sure do you want delete "+name+" Bank permanently?",
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
