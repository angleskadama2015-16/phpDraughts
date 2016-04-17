<?php $__env->startSection('about'); ?>
        <!--koda za firstview page, ki se bo pojavila v layout.blade.php ko bomo klicali yield za 'about'-->
    <h2>About page</h2>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>