<?php $__env->startSection('firstview'); ?>
    <!--koda za firstview page, ki se bo pojavila v layout.blade.php ko bomo klicali yield za 'firstview'-->
    <h2>Welcome to phpDraughts!</h2>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>