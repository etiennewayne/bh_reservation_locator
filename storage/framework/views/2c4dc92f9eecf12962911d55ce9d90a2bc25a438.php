<?php $__env->startSection('content'); ?>
    <landowner-dashboard prop-user="<?php echo e(auth()->user()); ?>"></landowner-dashboard>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.landowner-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\eshen\Desktop\Github\bh_reservation_locator\resources\views/landowner/landowner-dashboard.blade.php ENDPATH**/ ?>