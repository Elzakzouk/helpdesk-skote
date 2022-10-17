

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Cities'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Settings <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Cities <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div>
        INDEX
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\projects\helpdesk-skote\resources\views/city/index.blade.php ENDPATH**/ ?>