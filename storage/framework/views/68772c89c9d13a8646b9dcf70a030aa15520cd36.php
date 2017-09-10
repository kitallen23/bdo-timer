<?php $__env->startSection('title', 'BDO Market Timer'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Script for clock -->
    <script src="<?php echo e(URL::asset('js/currentTime.js')); ?>"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">

    <div class="content">
        <div class="current-time-wrapper text-center">
            <div id="current-time-hm">00 00</div>
            <div id="current-time-s">00</div>
        </div>

        <form action="<?php echo e(url("/submit")); ?>" id="item-form">
            <div class="col-sm-10 col-sm-offset-1 form-item-wrapper">
                <div class="form-item-inner-wrapper">

                        <div class="form-item-timer col-sm-2 form-item text-center"><span>00:00</span></div>

                        <div class="form-item col-sm-4">
                            <div class="form-item-img"></div>
                            <input type="text" class="btn-new form-control" id="input-itemname"/>
                        </div>

                        <div class="col-sm-2 form-item-enhancement form-item">
                            <div class="form-center-h">
                            <select id="input-enhancement" class="btn-new form-control">
                                <option>+0</option>
                                <option>+1</option>
                                <option>+2</option>
                                <option>+3</option>
                                <option>+4</option>
                                <option>+5</option>
                                <option>+6</option>
                                <option>+7</option>
                                <option>+8</option>
                                <option>+9</option>
                                <option>+10</option>
                                <option>+11</option>
                                <option>+12</option>
                                <option>+13</option>
                                <option>+14</option>
                                <option>+15</option>
                                <option>PRI</option>
                                <option>DUO</option>
                                <option>TRI</option>
                                <option>TET</option>
                                <option>PEN</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-item col-sm-2">
                            <div class="form-center-h">
                            <img src="<?php echo e(URL::asset('img/script-icon.png')); ?>" class="form-item-icon" />
                            <input type="text" class="btn-new form-control" id="input-itemcount"/>
                        </div>
                        </div>

                        <div class="col-sm-2 form-item-offset form-item">
                            <div class="form-center-h">
                            <div class="form-item-texticon text-center"><span class="glyphicon glyphicon-time text-valign"></span></div>
                            <select id="input-offset" class="btn-new form-control">
                                <option>-</option>
                                <option>1 min</option>
                                <option>2 mins</option>
                                <option>3 mins</option>
                                <option>4 mins</option>
                                <option>5 mins</option>
                            </select>
                        </div>
                        </div>

                </div>


                <div class="progress col-xs-12 progress-custom">
                    <div class="progress-bar progress-bar-success" style="width: 50%"></div>
                    <div class="progress-bar progress-bar-warning" style="width: 25%"></div>
                    <div class="progress-bar progress-bar-danger" style="width: 25%"></div>
                </div>
            </div>

            <!-- Space here for tick to submit form -->
            <div class="col-xs-1 form-center-h" onclick="submitItem();">
                <div class="form-item-submiticon text-center"><span class="glyphicon glyphicon-ok text-valign"></span></div>
            </div>

        </form>


    </div>

    <script>
        function submitItem()
        {
            document.getElementById('item-form').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>