

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Cities'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('li_1'); ?> Settings <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?> Cities <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php if( Session::has('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Created successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
<?php endif; ?>

<div style="padding-left:95%;padding-bottom:30px;">
                <a class="btn btn-success" href="<?php echo e(route('cities.index')); ?>">Back</a>
                </div>

    <div class="col-xl-15">
        <div class="card" >
            <div class="card-body">
                <h4 class="card-title mb-4">Create New City</h4>

                <form action="<?php echo e(route('cities.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-9 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="horizontal-firstname-input"  name="name" placeholder="Enter name of City  ">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger mt-1" ><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-9 col-form-label">Name in Arabic</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?php $__errorArgs = ['name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="horizontal-email-input" name="name_ar" placeholder="Enter name in arabic">
                            <?php $__errorArgs = ['name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger mt-1" ><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div>
                    <div class="form-check form-switch form-switch-lg mb-5" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg" name="main" value="1" checked>
                            </div>   
                    </div>
               

                    <div class="row justify-content-end">
                        <div class="col-sm-8">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\helpdesk-skote\resources\views/city/create.blade.php ENDPATH**/ ?>