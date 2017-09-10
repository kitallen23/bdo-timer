<?php $__env->startSection('title', 'BDO Market Timer'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header text-center">
            <h2>TIME</h2><br />
        </div>
        <br />
    </div>

    <script type="text/javascript">
        $(document).ready(function()
        {
            $(".nav-timer").addClass('active');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>