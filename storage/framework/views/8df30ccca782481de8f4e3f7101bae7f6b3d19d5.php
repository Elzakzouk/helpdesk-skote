
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Cities'); ?> <?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('li_1'); ?> Settings <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?> Cities <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


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
                 
                                <a class="dropdown-item" href="<?php echo e(url('archive')); ?>">Deleted Record</a>
                            
                           
                               <a class="dropdown-item" href="<?php echo e(route('cities.index')); ?>">Record</a>
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
                                <th>Deleted_at</th>
                                <th></th>
                              
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($city->name); ?> </td>
                                <td><?php echo e($city->name_ar); ?></td>
                                <td><?php if($city->main === 1): ?>
                                <i class="mdi mdi-check-circle"></i>
                                    <?php else: ?>
                                <i class="mdi mdi-check-circle-outline"></i>
                                    <?php endif; ?> </td>
                                <td><?php echo e($city->updated_at); ?></td>
                                <td><?php echo e($city->created_at); ?></td>
                                <td><?php echo e($city->deleted_at); ?></td>
                                <td class="d-flex gap-3">  <form method="POST" action="<?php echo e(route('cities.force-delete', $city->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="border-0 bg-transparent text-danger p-0 d-flex align-items-center gap-1 force_delete_confirm"><i class="bx bx-trash label-icon"></i><span>Force Delete</span></button>
                                                
                                            </form>
                                   <form method="POST" action="<?php echo e(route('cities.restore', $city->id)); ?>" class="d-flex align-items-center">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="border-0 bg-transparent text-warning p-0 d-flex align-items-center gap-1 restore_confirm"><i class="bx bx-undo label-icon"></i><span>Restore</span></button>
                                            </form></td>
                              
                                
                                
                            
                
                            
                                
                            

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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\helpdesk-skote\resources\views/City/archive.blade.php ENDPATH**/ ?>