
<div class="row-wrapper col-xs-12" id="item-{{$time}}">

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
                <div class="form-center-h" id="timer-{{$time}}">
                    <span id="mins-{{$time}}">-10</span>:<span id="secs-{{$time}}">00</span>
                </div>
            </div>

            <div class="form-item col-sm-4">
                <div class="form-item-img text-center" id="iconbox-{{$time}}"></div>
                <div class="btn-new2 form-control truncate">{{ $itemname }}</div>
            </div>

            <div class="col-sm-2 form-item-enhancement form-item border-left">
                <div class="form-center-h">
                    <select id="input-enhancement-{{$time}}" class="btn-new2 form-control set-width-input"
                            name="enhancement" onchange="setEnhancement(this.value, 'iconbox-{{$time}}')">
                        <option id="+0-{{$time}}">+0</option>
                        <option id="+1-{{$time}}">+1</option>
                        <option id="+2-{{$time}}">+2</option>
                        <option id="+3-{{$time}}">+3</option>
                        <option id="+4-{{$time}}">+4</option>
                        <option id="+5-{{$time}}">+5</option>
                        <option id="+6-{{$time}}">+6</option>
                        <option id="+7-{{$time}}">+7</option>
                        <option id="+8-{{$time}}">+8</option>
                        <option id="+9-{{$time}}">+9</option>
                        <option id="+10-{{$time}}">+10</option>
                        <option id="+11-{{$time}}">+11</option>
                        <option id="+12-{{$time}}">+12</option>
                        <option id="+13-{{$time}}">+13</option>
                        <option id="+14-{{$time}}">+14</option>
                        <option id="+15-{{$time}}">+15</option>
                        <option id="PRI-{{$time}}">PRI</option>
                        <option id="DUO-{{$time}}">DUO</option>
                        <option id="TRI-{{$time}}">TRI</option>
                        <option id="TET-{{$time}}">TET</option>
                        <option id="PEN-{{$time}}">PEN</option>
                    </select>
                </div>
            </div>

            <div class="form-item col-sm-2">
                <div class="form-center-h">
                    <div class="form-item-texticon text-center">
                        <span class="glyphicon glyphicon-list text-valign accumulated-trades"></span>
                    </div>
                    <input type="number" class="btn-new2 form-control set-width-input" min="0" id="at-{{$time}}"
                           name="accumulatedtrades" value="{{$accumulatedtrades}}" />
                </div>
            </div>

            <div class="col-sm-2 form-item-offset form-item">
                <div class="form-center-h">
                    <div class="form-item-texticon text-center"><span class="glyphicon glyphicon-time text-valign"></span></div>
                    <div class="btn-new2 form-control set-width-input" id="os-{{$time}}">{{ $offset }}</div>
                </div>
            </div>

        </div>


        <div class="progress-custom-wrapper">
            <div class="progress col-xs-12 progress-custom">
                <div class="progress-bar progress-bar-success" id="green-{{$time}}" style="width: 50%"></div>
                <div class="progress-bar progress-bar-warning" id="orange-{{$time}}" style="width: 25%"></div>
                <div class="progress-bar progress-bar-danger" id="red-{{$time}}" style="width: 25%"></div>
            </div>
        </div>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="time" value="{{ $time }}">

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
    var _isJ{{$time}} = false;
    $(document).ready(function()
    {
        updateTimer{{$time}}();

        // Set enhancement list
        setEnhancementList("input-enhancement-{{$time}}", '{{$itemname}}', '{{$time}}', _isJ{{$time}});

        // Set the selected dropdown value
        document.getElementById('{{$enhancement}}-{{$time}}').selected = "true";

        // Set the enhancement level on the item icon
        setEnhancement(document.getElementById("input-enhancement-{{$time}}").value, 'iconbox-{{$time}}')

        // Set the icon image
        setIconImage('iconbox-{{$time}}', '{{$itemname}}');
    });

    // Cached document objects
    var mins{{$time}} = document.getElementById('mins-{{$time}}');
    var secs{{$time}} = document.getElementById('secs-{{$time}}');
    var timer{{$time}} = document.getElementById('timer-{{$time}}');
    var green{{$time}} = document.getElementById('green-{{$time}}');
    var orange{{$time}} = document.getElementById('orange-{{$time}}');
    var red{{$time}} = document.getElementById('red-{{$time}}');

    function updateTimer{{$time}}()
    {
        var start_t = '{{$time}}';
        var curr_t_offset = Math.round(new Date().valueOf()/1000)-(10*60);
        var curr_t = Math.round(new Date().valueOf()/1000);
        var timeElapsedOffset = curr_t_offset - start_t;
        var timeElapsed = curr_t - start_t;
        var absTimeElapsed = Math.abs(timeElapsed);
        var absTimeElapsedOffset = Math.abs(timeElapsedOffset);

        if(timeElapsed >= 1500)
        {
            document.getElementById('item-{{$time}}').style.display = "none";
            return;
        }

        // Update times
        mins{{$time}}.innerHTML = timeElapsedOffset < 0 ?
            "-"+zeroPadTime(Math.floor(absTimeElapsedOffset/60))
            :
            zeroPadTime(Math.floor(timeElapsedOffset/60));
        secs{{$time}}.innerHTML = zeroPadTime(Math.abs(absTimeElapsedOffset % 60));

        // Update color
        if(timeElapsedOffset >= 0 && timeElapsedOffset < 300)
        {
            // Orange
            timer{{$time}}.style.color = '#e99002';

            green{{$time}}.style.width = '50%';
            orange{{$time}}.style.width = (timeElapsedOffset/300)*25+'%';
            red{{$time}}.style.width = '0%';
        }
        else if(timeElapsedOffset >= 300 && timeElapsedOffset < 600)
        {
            // Red
            timer{{$time}}.style.color = '#f04124';

            green{{$time}}.style.width = '50%';
            orange{{$time}}.style.width = '25%';
            red{{$time}}.style.width = ((timeElapsedOffset-300)/300) < 1? ((timeElapsedOffset-300)/300)*25 + '%' : '25%';
        }
        else if(timeElapsedOffset >= 600)
        {
            // Expired
            timer{{$time}}.style.color = 'black';
            timer{{$time}}.style.textDecoration = 'line-through';

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

        setTimeout(updateTimer{{$time}}, 500);
    }
</script>