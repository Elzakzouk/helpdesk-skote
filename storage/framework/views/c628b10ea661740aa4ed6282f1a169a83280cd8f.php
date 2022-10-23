

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.regions'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php if( Session::has('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
                        updated successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
<?php endif; ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Settings <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Cities <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between my-2 align-items-center">
                        <h4 class="card-title">Leads table</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="<?php echo e(route('leads.create')); ?>"  class="btn btn-primary waves-effect waves-light">Create</a>
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
                        <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($lead->city->name); ?></td>
                                    <td class="get_name"><?php echo e($lead->name); ?></td>
                                    <td><?php echo e($lead->code); ?></td>
                                    <td><?php echo e($lead->address); ?></td>
                                    <td><?php echo e($lead->updated_at); ?></td>
                                    <td><?php echo e($lead->created_at); ?></td>
                                    <td>       
                                        <div class="d-flex flex-wrap gap-2">

                                            <a href="<?php echo e(route('leads.edit', $lead->id)); ?>" class="d-flex align-items-center text-primary gap-1"><i class="bx bx-edit-alt label-icon"></i>Edit</a>
                                            <a href="<?php echo e(route('leads.show', $lead->id)); ?>" class="d-flex align-items-center text-success gap-1"><i class="bx bx-show label-icon"></i>Show</a>

                                            <?php if(!$lead->trashed()): ?>
                                            <form method="POST" action="<?php echo e(route('leads.destroy', $lead)); ?>" class="d-flex align-items-center">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                
                                                <button type="submit" class="border-0 bg-transparent text-danger p-0 d-flex align-items-center gap-1 delete_confirm"><i class="bx bx-trash label-icon"></i><span>Delete</span></button>
                                            </form>
                                            <?php else: ?>
                                            <form method="POST" action="<?php echo e(route('leads.force-delete',$lead)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="border-0 bg-transparent text-danger p-0 d-flex align-items-center gap-1 force_delete_confirm"><i class="bx bx-trash label-icon"></i><span>Force Delete</span></button>
                                                
                                            </form>

                                            <form method="POST" action="<?php echo e(route('leads.restore',$lead)); ?>" class="d-flex align-items-center">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="border-0 bg-transparent text-warning p-0 d-flex align-items-center gap-1 restore_confirm"><i class="bx bx-undo label-icon"></i><span>Restore</span></button>
                                            </form>
                                            <?php endif; ?>
                                                                                
                                    </td>
                                    
                                   
                                 
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                          
                        </tbody>
                      
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
        
    </div> <!-- end row -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
   <!-- Required datatable js -->
   <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
    <!-- Sweet Alerts js -->
    <script src="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    <!-- Sweet alert init js-->
    <script src="<?php echo e(URL::asset('/assets/js/pages/sweet-alerts.init.js')); ?>"></script>


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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\helpdesk-skote\resources\views/lead/index.blade.php ENDPATH**/ ?>