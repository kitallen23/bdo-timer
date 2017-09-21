
$(document).ready(function()
{
    if(!!document.getElementById('current-time-hm') &&
        !!document.getElementById('current-time-s') &&
        !!document.getElementById('time-format-button'))
    {

        var timeFormat = getCookie('timeformat');
        if(timeFormat === "")
            timeFormat = setTimeFormatCookie();

        document.getElementById('time-format-button').checked = (timeFormat === "24h");

        currentTime();
    }

    if(!!document.getElementById('game-time'))
    {
        gameTime();
    }
});

function setTimeFormatCookie()
{
    var display24hr = document.getElementById('time-format-button').checked;
    if(display24hr)
    {
        return setCookie("timeformat", "24h");
    }
    return setCookie("timeformat", "12h");
}

function currentTime()
{
    var dt = new Date();
    var h = dt.getHours();
    var m = dt.getMinutes();
    var s = dt.getSeconds();
    displayCurrentTime(h, m, s);

    setTimeout(currentTime, 500);
}

function displayCurrentTime(h, m, s)
{
    var display24hr = document.getElementById('time-format-button').checked;

    if(!display24hr && h > 12)
    {
        document.getElementById('current-time-hm').innerHTML = zeroPadTime(h-12) + " " + zeroPadTime(m);
        document.getElementById('current-time-s').innerHTML = zeroPadTime(s);
    }
    else if(!display24hr && h === 0)
    {
        document.getElementById('current-time-hm').innerHTML = "12 " + zeroPadTime(m);
        document.getElementById('current-time-s').innerHTML = zeroPadTime(s);
    }
    else
    {
        document.getElementById('current-time-hm').innerHTML = zeroPadTime(h) + " " + zeroPadTime(m);
        document.getElementById('current-time-s').innerHTML = zeroPadTime(s);
    }
}

function getTimeStringHM(h, m)
{
    var display24hr = document.getElementById('time-format-button').checked;

    if(!display24hr && h > 12)
    {
        return (h-12) + ":" + zeroPadTime(m) + ampm(h);
    }
    else if(!display24hr && h === 0)
    {
        return "12:" + zeroPadTime(m) + ampm(h);
    }
    else if(!display24hr)
    {

        return h + ":" + zeroPadTime(m) + ampm(h);
    }
    return zeroPadTime(h) + ":" + zeroPadTime(m);
}

// Zero-pads time
function zeroPadTime(i)
{
    if (i < 10)
    {
        i = "0" + i;
    }
    return i;
}

var isDay = false;
var inGameHour = 0;
var inGameMinute = 0;
var secsUntilNightStart = 0;
var secsUntilNightEnd = 0;

function gameTime()
{

    var d = new Date();
    var startHour = Date.UTC( d.getUTCFullYear(),d.getUTCMonth(),d.getUTCDate(),0,0,0,0);
    var rlDayElapsedS = (Date.now() - startHour)/1000;
    var secsIntoGameDay = (rlDayElapsedS+(200*60)+(20*60))%(240*60);

    // Last part of the shifted day is night
    if( secsIntoGameDay >= 12000 )
    {

        var secsIntoGameNight = secsIntoGameDay - 12000;
        var pctOfNightDone = secsIntoGameNight / ((40)*60);
        var currGameHour = 9*pctOfNightDone;
        currGameHour = currGameHour<2? (22+currGameHour) : (currGameHour-2);
        var secsUntilNightEnd_t = (40*60)-secsIntoGameNight;

        isDay = false;
        inGameHour = (currGameHour)>>0;
        inGameMinute = ((currGameHour%1)*60)>>0;
        secsUntilNightEnd = secsUntilNightEnd_t;
        secsUntilNightStart = secsUntilNightEnd_t + 12000;

    }
    else
    {

        var secsIntoGameDaytime = secsIntoGameDay;
        var pctOfDayDone = secsIntoGameDay / ((200)*60);
        var gameHour = 7 + ((22-7)*pctOfDayDone);
        var secsUntilNightStart_t = 12000 - secsIntoGameDaytime;

        isDay = true;
        inGameHour = (gameHour)>>0;
        inGameMinute = ((gameHour%1)*60)>>0;
        secsUntilNightEnd = secsUntilNightStart_t + (40*60);
        secsUntilNightStart = secsUntilNightStart_t;
    }

    displayGameTime();
    setTimeout(gameTime, 500);
}

function displayGameTime()
{
    // BDO time
    document.getElementById('game-time').innerHTML = displayHour() + ":" + displayMinute() + ampm(inGameHour);
    document.getElementById('day-night-icon').className = isDay? "fa fa-sun-o spinme" : "fa fa-moon-o pulseme";

    // Time to next changeover (day/night)
    if(isDay)
    {
        document.getElementById('game-time-to-changeover').innerHTML = countdownTime(secsUntilNightStart);
        document.getElementById('day-night-changeover-icon').className = "fa fa-moon-o pulseme";
    }
    else
    {
        document.getElementById('game-time-to-changeover').innerHTML = countdownTime(secsUntilNightEnd);
        document.getElementById('day-night-changeover-icon').className = "fa fa-sun-o spinme";
    }
}

function ampm(h)
{
    return h < 12 ? 'am' : 'pm';
}

function displayHour()
{
    var t = inGameHour % 12;
    if( t === 0 ) { t = 12; }
    return (inGameHour > 0 && inGameHour < 10) ? ('0' + (+t)) : t;
}

function displayMinute()
{
    return inGameMinute < 10 ? ('0' + (+inGameMinute)) : inGameMinute;
}

function countdownTime(secs)
{
    if(secs < 60)
    {
        return "1 min";
    }
    else if(secs < 60*60)
    {
        return ((secs/60)>>0) + "m";
    }
    else
    {
        return ((secs/3600)>>0) + "h " + (((secs%3600)/60)>>0) + "m"
    }
}
