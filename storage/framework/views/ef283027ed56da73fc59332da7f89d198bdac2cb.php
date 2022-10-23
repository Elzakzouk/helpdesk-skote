
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
                <h4 class="card-title mb-4">City information </h4>
            
                 
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-firstname-input"  name="name" value="<?php echo e($city->name); ?>"  readonly >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Name in Arabic</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="horizontal-email-input" name="name_ar" value="<?php echo e($city->name_ar); ?>"  readonly >
                        </div>
                    </div>


                    <div class="form-check form-switch form-switch-lg mb-5" dir="ltr" >
                    <input type="hidden" class="form-control" name="main" value="0" />
                                <input class="form-check-input"  type="checkbox" id="flexSwitchCheckChecked" name="main" value="1" <?php echo e($city->main ||old('main',0)===1 ?'checked':''); ?> >
                                <label class="form-check-label" for="flexSwitchCheckChecked">
                                    </label>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\helpdesk-skote\resources\views/city/show.blade.php ENDPATH**/ ?>