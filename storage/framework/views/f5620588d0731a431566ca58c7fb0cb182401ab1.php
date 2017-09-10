<?php $__env->startSection('title', 'BDO Market Timer'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Scripts etc. -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/awesomplete.css')); ?>" />
    <script src="<?php echo e(URL::asset('js/awesomplete.js')); ?>" async></script>

    <script src="<?php echo e(URL::asset('js/utility.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/time.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/all-items.js')); ?>"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">

    <div class="col-xs-12 time-format-buttons">

        <label class="switch">
            <input type="checkbox" id="time-format-button" onchange="setTimeFormatCookie();">
            <div class="slider"><div class="slider-l">24h</div><div class="slider-r text-right">12h</div></div>
        </label>
    </div>

    <div class="container">

        <div class="content">
            <div class="current-time-wrapper text-center">
                <div id="current-time-hm">00 00</div>
                <div id="current-time-s">00</div>
            </div>

            <div class="game-time-wrapper text-center">
                <div class="col-md-3 col-md-offset-3">
                    <span class="game-time-icon"><i class="fa fa-moon-o" id="day-night-icon" aria-hidden="true"></i></span>
                    <span id="game-time">00 00</span>
                </div>
                <div class="col-md-3 dim">
                    <span class="game-time-icon"><i class="fa fa-moon-o" id="day-night-changeover-icon" aria-hidden="true"></i></span>
                    <span id="game-time-to-changeover">00 00</span>
                </div>
            </div>

            <?php echo Form::open(array('route' => 'timer.add','method'=>'POST')); ?>

            <?php echo $__env->make('timer.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::close(); ?>



            <?php if(Session::has('items')): ?>
                <?php $__currentLoopData = Session::get('items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php echo Form::open(array('route' => 'timer.update','method'=>'POST')); ?>

                    <?php echo $__env->make('timer.item', ['itemname' => $item[0][0], 'enhancement' => $item[0][1],
                        'accumulatedtrades' => $item[0][2], 'offset' => $item[0][3], 'time' => $item[0][4]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::close(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <!-- VIEW SESSION -->
            

        </div>
    </div>

    <script>
        $(document).ready(function(){
            // Enable tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>