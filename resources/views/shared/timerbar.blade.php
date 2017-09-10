<div class="col-xs-12 timerbar-wrapper">
    <div class="progress col-xs-12 progress-custom-lg" id="timerbar">
        <div class="progress-bar progress-bar-success" id="green-{{$time}}" style="width: 50%"></div>
        <div class="progress-bar progress-bar-warning" id="orange-{{$time}}" style="width: 25%"></div>
        <div class="progress-bar progress-bar-danger" id="red-{{$time}}" style="width: 25%"></div>
    </div>
</div>

<script>
    $(document).ready(function()
    {
        updateTimerbar();
    });

    var green{{$time}} = document.getElementById('green-{{$time}}');
    var orange{{$time}} = document.getElementById('orange-{{$time}}');
    var red{{$time}} = document.getElementById('red-{{$time}}');

    function updateTimerbar()
    {
        var start_t = '{{$time}}';
        var curr_t_offset = Math.round(new Date().valueOf()/1000)-(10*60);
        var curr_t = Math.round(new Date().valueOf()/1000);
        var timeElapsedOffset = curr_t_offset - start_t;
        var timeElapsed = curr_t - start_t;

        // Hide timerbar if item has expired
        if(timeElapsed >= 1200)
        {
            document.getElementById('timerbar').style.display = "none";
            return;
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

        setTimeout(updateTimerbar, 500);
    }
</script>