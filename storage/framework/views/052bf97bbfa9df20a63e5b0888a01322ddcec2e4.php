
<div class="row-wrapper col-xs-12" id="item-<?php echo e($time); ?>">

    <div class="col-xs-1 form-center-h">
        <div class="form-item-updateicon text-center">
            <button type="submit" class="btn-submit btn-submit-blue" name="submit" value="update">
                <span class="glyphicon glyphicon-upload text-valign"></span>
            </button>
        </div>
    </div>

    <div class="col-sm-10 form-item-wrapper">
        <div class="form-item-inner-wrapper">

            <div class="form-item-timer col-sm-2 form-item text-center">
                <div class="form-center-h" id="timer-<?php echo e($time); ?>">
                    <span id="mins-<?php echo e($time); ?>">-10</span>:<span id="secs-<?php echo e($time); ?>">00</span>
                </div>
            </div>

            <div class="form-item col-sm-4">
                <div class="form-item-img text-center" id="iconbox-<?php echo e($time); ?>"></div>
                <div class="btn-new2 form-control truncate"><?php echo e($itemname); ?></div>
            </div>

            <div class="col-sm-2 form-item-enhancement form-item border-left">
                <div class="form-center-h">
                    <select id="input-enhancement-<?php echo e($time); ?>" class="btn-new2 form-control set-width-input"
                            name="enhancement" onchange="setEnhancement(this.value, 'iconbox-<?php echo e($time); ?>')">
                        <option id="+0-<?php echo e($time); ?>">+0</option>
                        <option id="+1-<?php echo e($time); ?>">+1</option>
                        <option id="+2-<?php echo e($time); ?>">+2</option>
                        <option id="+3-<?php echo e($time); ?>">+3</option>
                        <option id="+4-<?php echo e($time); ?>">+4</option>
                        <option id="+5-<?php echo e($time); ?>">+5</option>
                        <option id="+6-<?php echo e($time); ?>">+6</option>
                        <option id="+7-<?php echo e($time); ?>">+7</option>
                        <option id="+8-<?php echo e($time); ?>">+8</option>
                        <option id="+9-<?php echo e($time); ?>">+9</option>
                        <option id="+10-<?php echo e($time); ?>">+10</option>
                        <option id="+11-<?php echo e($time); ?>">+11</option>
                        <option id="+12-<?php echo e($time); ?>">+12</option>
                        <option id="+13-<?php echo e($time); ?>">+13</option>
                        <option id="+14-<?php echo e($time); ?>">+14</option>
                        <option id="+15-<?php echo e($time); ?>">+15</option>
                        <option id="PRI-<?php echo e($time); ?>">PRI</option>
                        <option id="DUO-<?php echo e($time); ?>">DUO</option>
                        <option id="TRI-<?php echo e($time); ?>">TRI</option>
                        <option id="TET-<?php echo e($time); ?>">TET</option>
                        <option id="PEN-<?php echo e($time); ?>">PEN</option>
                    </select>
                </div>
            </div>

            <div class="form-item col-sm-2">
                <div class="form-center-h">
                    <div class="form-item-texticon text-center">
                        <span class="glyphicon glyphicon-list text-valign accumulated-trades"></span>
                    </div>
                    <input type="number" class="btn-new2 form-control set-width-input" min="0" id="at-<?php echo e($time); ?>"
                           name="accumulatedtrades" value="<?php echo e($accumulatedtrades); ?>" />
                </div>
            </div>

            <div class="col-sm-2 form-item-offset form-item">
                <div class="form-center-h">
                    <div class="form-item-texticon text-center"><span class="glyphicon glyphicon-time text-valign"></span></div>
                    <div class="btn-new2 form-control set-width-input" id="os-<?php echo e($time); ?>"><?php echo e($offset); ?></div>
                </div>
            </div>

        </div>


        <div class="progress col-xs-12 progress-custom">
            <div class="progress-bar progress-bar-success" id="green-<?php echo e($time); ?>" style="width: 50%"></div>
            <div class="progress-bar progress-bar-warning" id="orange-<?php echo e($time); ?>" style="width: 25%"></div>
            <div class="progress-bar progress-bar-danger" id="red-<?php echo e($time); ?>" style="width: 25%"></div>
        </div>
    </div>

    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <input type="hidden" name="time" value="<?php echo e($time); ?>">

    <!-- Remove item -->
    <div class="col-xs-1 form-center-h">
        <div class="form-item-removeicon text-center">
            <button type="submit" class="btn-submit btn-submit-red" name="submit" value="remove">
                <span class="glyphicon glyphicon-remove text-valign"></span>
            </button>
        </div>
    </div>
</div>

<script>
    var _isJ<?php echo e($time); ?> = false;
    $(document).ready(function()
    {
        updateTimer<?php echo e($time); ?>();

        // Set enhancement list
        setEnhancementList("input-enhancement-<?php echo e($time); ?>", '<?php echo e($itemname); ?>', '<?php echo e($time); ?>', _isJ<?php echo e($time); ?>);

        // Set the selected dropdown value
        document.getElementById('<?php echo e($enhancement); ?>-<?php echo e($time); ?>').selected = "true";

        // Set the enhancement level on the item icon
        setEnhancement(document.getElementById("input-enhancement-<?php echo e($time); ?>").value, 'iconbox-<?php echo e($time); ?>')

        // Set the icon image
        setIconImage('iconbox-<?php echo e($time); ?>', '<?php echo e($itemname); ?>');
    });

    // Cached document objects
    var mins<?php echo e($time); ?> = document.getElementById('mins-<?php echo e($time); ?>');
    var secs<?php echo e($time); ?> = document.getElementById('secs-<?php echo e($time); ?>');
    var timer<?php echo e($time); ?> = document.getElementById('timer-<?php echo e($time); ?>');
    var green<?php echo e($time); ?> = document.getElementById('green-<?php echo e($time); ?>');
    var orange<?php echo e($time); ?> = document.getElementById('orange-<?php echo e($time); ?>');
    var red<?php echo e($time); ?> = document.getElementById('red-<?php echo e($time); ?>');

    function updateTimer<?php echo e($time); ?>()
    {
        var start_t = '<?php echo e($time); ?>';
        var curr_t_offset = Math.round(new Date().valueOf()/1000)-(10*60);
        var curr_t = Math.round(new Date().valueOf()/1000);
        var timeElapsedOffset = curr_t_offset - start_t;
        var timeElapsed = curr_t - start_t;
        var absTimeElapsed = Math.abs(timeElapsed);
        var absTimeElapsedOffset = Math.abs(timeElapsedOffset);

        if(timeElapsed >= 1500)
        {
            document.getElementById('item-<?php echo e($time); ?>').style.display = "none";
            return;
        }

        // Update times
        mins<?php echo e($time); ?>.innerHTML = timeElapsedOffset < 0 ?
            "-"+zeroPadTime(Math.floor(absTimeElapsedOffset/60))
            :
            zeroPadTime(Math.floor(timeElapsedOffset/60));
        secs<?php echo e($time); ?>.innerHTML = zeroPadTime(Math.abs(absTimeElapsedOffset % 60));

        // Update color
        if(timeElapsedOffset >= 0 && timeElapsedOffset < 300)
        {
            // Orange
            timer<?php echo e($time); ?>.style.color = '#e99002';

            green<?php echo e($time); ?>.style.width = '50%';
            orange<?php echo e($time); ?>.style.width = (timeElapsedOffset/300)*25+'%';
            red<?php echo e($time); ?>.style.width = '0%';
        }
        else if(timeElapsedOffset >= 300 && timeElapsedOffset < 600)
        {
            // Red
            timer<?php echo e($time); ?>.style.color = '#f04124';

            green<?php echo e($time); ?>.style.width = '50%';
            orange<?php echo e($time); ?>.style.width = '25%';
            red<?php echo e($time); ?>.style.width = ((timeElapsedOffset-300)/300) < 1? ((timeElapsedOffset-300)/300)*25 + '%' : '25%';
        }
        else if(timeElapsedOffset >= 600)
        {
            // Expired
            timer<?php echo e($time); ?>.style.color = 'black';
            timer<?php echo e($time); ?>.style.textDecoration = 'line-through';

            green<?php echo e($time); ?>.style.width = '50%';
            orange<?php echo e($time); ?>.style.width = '25%';
            red<?php echo e($time); ?>.style.width = '25%';
        }
        else
        {
            // Green
            green<?php echo e($time); ?>.style.width = (timeElapsed/600)*50+'%';
            orange<?php echo e($time); ?>.style.width = '0%';
            red<?php echo e($time); ?>.style.width = '0%';

        }

        setTimeout(updateTimer<?php echo e($time); ?>, 500);
    }
</script>