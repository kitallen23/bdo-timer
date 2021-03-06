
<div class="settings-button-wrapper">

    <!-- Toggle button -->
    <div class="col-xs-12 settings-button text-right text-muted" id="settings-toggle-button">
        <i class="fa fa-cog" id="settings-toggle-icon"></i>
    </div>

    <!-- Settings buttons etc. -->
    <div id="settings-toggle-wrapper" style="display:none;">
        <div class="col-xs-12 settings-button">
            <label class="switch">
                <input type="checkbox" id="time-format-button" onchange="setTimeFormatCookie();">
                <div class="slider"><div class="slider-l">24h</div><div class="slider-r text-right">12h</div></div>
            </label>
        </div>

        <div class="col-xs-12 settings-button">
            <label class="switch">
                <input type="checkbox" id="volume-switch-button" onchange="setVolumeSwitchCookie();">
                <div class="slider">
                    <div class="slider-l"><i class="fa fa-volume-off"></i></div><div class="slider-r text-right"><i class="fa fa-volume-up"></i></div>
                </div>
            </label>
        </div>

        <div class="col-xs-12 settings-button" id="volume-slider" style="display:none;">
            <label class="volume-level-switch">
                <input id="volume-level" type="range" min="1" max="100" value="100" onchange="setVolume()" />
            </label>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        // Set volume button
        if(!!document.getElementById('volume-switch-button'))
        {
            var muteSound = getCookie('volumeOn');
            if(muteSound === "")
                muteSound = setVolumeSwitchCookie();

            document.getElementById('volume-switch-button').checked = (muteSound === "true");
            document.getElementById('volume-slider').style.display = (muteSound === "true") ? "none" : "block";
        }
        // Set volume range
        if(!!document.getElementById('volume-level'))
        {
            var volumeLevel = getCookie('volumeLevel');
            if(volumeLevel === "")
                volumeLevel = setVolumeLevelCookie();

            document.getElementById('volume-level').value = volumeLevel;
        }

        if(!!document.getElementById('audio-notification'))
        {
            setVolume();
        }
    });

    $('#settings-toggle-button').click(function() {
        $('#settings-toggle-wrapper').slideToggle("fast");
        $('#settings-toggle-icon').toggleClass("rotate");
    });
    $('#volume-switch-button').click(function() {
        $('#volume-slider').slideToggle("fast");
    });
</script>
