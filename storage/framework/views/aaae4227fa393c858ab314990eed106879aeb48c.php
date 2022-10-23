
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Cities'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('li_1'); ?> Settings <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?> Cities <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="col-xl-15">
        <div class="card" >
            <div class="card-body">
                <h4 class="card-title mb-4">Lead information </h4>
            
                 
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">City</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-firstname-input"  name="city_id" value="<?php echo e($lead->city->name); ?>"  readonly >
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-email-input" name="name" value="<?php echo e($lead->name); ?>"  readonly >
                        </div>
                    </div>

                           
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Code</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-email-input" name="Code" value="<?php echo e($lead->code); ?>"  readonly >
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">address</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-email-input" name="address" value="<?php echo e($lead->address); ?>"  readonly >
                        </div>
                    </div>


                   

            
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

   <?php $__env->stopSection(); ?>
    



         







<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\helpdesk-skote\resources\views/lead/show.blade.php ENDPATH**/ ?>