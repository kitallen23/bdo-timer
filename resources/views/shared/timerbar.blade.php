
<div class="col-xs-12 timerbar-wrapper">
    <div class="progress col-xs-12 progress-custom-lg" id="timerbar-{{$time}}" style="display:none;">
        <div class="progress-bar progress-bar-success" id="green-{{$time}}" style="width: 50%"></div>
        <div class="progress-bar progress-bar-warning" id="orange-{{$time}}" style="width: 25%"></div>
        <div class="progress-bar progress-bar-danger" id="red-{{$time}}" style="width: 25%"></div>
    </div>
</div>

<script>

    var green{{$time}} = document.getElementById('green-{{$time}}');
    var orange{{$time}} = document.getElementById('orange-{{$time}}');
    var red{{$time}} = document.getElementById('red-{{$time}}');
    var timerbar_{{$time}} = document.getElementById('timerbar-{{$time}}');
    var playedAlert{{$time}} = false;

    function updateTimerbar{{$time}}()
    {
        var start_t = '{{$time}}';
        var curr_t_offset = Math.round(new Date().valueOf()/1000)-(10*60);
        var curr_t = Math.round(new Date().valueOf()/1000);
        var timeElapsedOffset = curr_t_offset - start_t;
        var timeElapsed = curr_t - start_t;

        // Hide timerbar if item has expired
        if(timeElapsed >= 1200)
        {
            timerbar_{{$time}}.style.display = "none";
            document.getElementById('iconbox-{{$time}}').style.display = "none";
            document.getElementById('form-{{$time}}').style.display = "none";

            // Unhide the next timerbar
            if(!!document.getElementById('timerbar-{{$next_time}}'))
            {
                document.getElementById('timerbar-{{$next_time}}').style.display = "block";
            }
            // Unhide next icon/form
            if(!!document.getElementById('iconbox-{{$next_time}}'))
            {
                document.getElementById('iconbox-{{$next_time}}').style.display = "block";
            }
            if(!!document.getElementById('form-{{$next_time}}'))
            {
                document.getElementById('form-{{$next_time}}').style.display = "block";
            }
            return;
        }

        // Visual/audio alert
        if(timeElapsed >= 540)
        {
            if(timeElapsed < 542 && playedAlert{{$time}} === false)
            {
                // Play alert sound & display visual alert
                playAlert("null");
            }
            // Stop alert from playing again
            playedAlert{{$time}} = true;
        }

        // Update timerbar colors
        if(timeElapsedOffset >= 0 && timeElapsedOffset < 300)
        {
            // Orange
            green{{$time}}.style.width = '50%';
            orange{{$time}}.style.width = (timeElapsedOffset/300)*25+'%';
            red{{$time}}.style.width = '0%';
        }
        else if(timeElapsedOffset >= 300 && timeElapsedOffset < 600)
        {
            // Red
            green{{$time}}.style.width = '50%';
            orange{{$time}}.style.width = '25%';
            red{{$time}}.style.width = ((timeElapsedOffset-300)/300) < 1? ((timeElapsedOffset-300)/300)*25 + '%' : '25%';
        }
        else if(timeElapsedOffset >= 600)
        {
            // Expired
            green{{$time}}.style.width = '50%';
            orange{{$time}}.style.width = '25%';
            red{{$time}}.style.width = '25%';
        }
        else
        {
            // Green
            green{{$time}}.style.width = (timeElapsed/600)*50+'%';
            orange{{$time}}.style.width = '0%';
            red{{$time}}.style.width = '0%';
        }

        setTimeout(updateTimerbar{{$time}}, 500);
    }
</script>