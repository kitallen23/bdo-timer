
// Add enhancement text to icon
function setEnhancement(enhancement, idToChange)
{
    var iconbox = document.getElementById(idToChange);
    if(enhancement === '-')
    {
        iconbox.innerHTML = '';
    }
    else if(enhancement.charAt(0) === '+')
    {
        iconbox.innerHTML = enhancement;
    }
    else
    {
        if(enhancement === 'PRI')
        {
            iconbox.innerHTML = 'I';
        }
        else if(enhancement === 'DUO')
        {
            iconbox.innerHTML = 'II';
        }
        else if(enhancement === 'TRI')
        {
            iconbox.innerHTML = 'III';
        }
        else if(enhancement === 'TET')
        {
            iconbox.innerHTML = 'IV';
        }
        else if(enhancement === 'PEN')
        {
            iconbox.innerHTML = 'V';
        }
    }
}

function setIconImage(elementID, itemname)
{
    var _name = itemname.replace(/[^a-z]/gi, '').toLowerCase();

    // Check if ultimate
    if(ultimateItems.indexOf(itemname.replace(/&#039;/g, "'")) > -1)
    {
        var no_ultimate = _name.replace('ultimate', '');
        document.getElementById(elementID).style.background = '#222 url("img/'+no_ultimate+'.png") no-repeat center';
    }
    else
    {
        document.getElementById(elementID).style.background = '#222 url("img/'+_name+'.png") no-repeat center';
    }

    // Set border
    if(orangeItems.indexOf(itemname.replace(/&#039;/g, "'")) > -1)
    {
        document.getElementById(elementID).style.border = '1px solid #ff5e14';
    }
    else if(yellowItems.indexOf(itemname.replace(/&#039;/g, "'")) > -1
            || ultimateItems.indexOf(itemname.replace(/&#039;/g, "'")) > -1)
    {
        document.getElementById(elementID).style.border = '1px solid gold';
    }
    else if(blueItems.indexOf(itemname.replace(/&#039;/g, "'")) > -1)
    {
        document.getElementById(elementID).style.border = '1px solid #0099ff';
    }
    else if(greenItems.indexOf(itemname.replace(/&#039;/g, "'")) > -1)
    {
        document.getElementById(elementID).style.border = '1px solid #acff59';
    }
    else
    {
        document.getElementById(elementID).style.border = 'none';
    }
}

function clearItemForm()
{
    document.getElementById('input-itemname').value = '';
    document.getElementById('input-enhancement').selectedIndex = 0;
    document.getElementById('iconbox').innerHTML = '';
    document.getElementById('iconbox').style.background = '#222 url("img/none.png") no-repeat center';
    document.getElementById('input-accumulatedtrades').value = '';
    document.getElementById('input-offset').selectedIndex = 0;
    document.getElementById('input-itemname').focus();
}

function clearScratchForm()
{
    document.getElementById('scratch-title').value = '';
    document.getElementById('scratch-comment').value = '';
    document.getElementById('scratch-title').focus();
}

function playNotification()
{
    document.getElementById('audio-notification').play();
}

function playAlert(selectorID)
{
    if(!document.getElementById('volume-switch-button').checked)
    {
        playNotification();
    }

    if(!!document.getElementById(selectorID))
    {
        $("#"+selectorID).addClass("flash");

        setTimeout( function(){
            $("#"+selectorID).removeClass("flash");
        }, 5000);
    }
}

function setVolume()
{
    document.getElementById('audio-notification').volume = document.getElementById('volume-level').value/100;
    setVolumeLevelCookie();
}

function setVolumeSwitchCookie()
{
    var playSound = document.getElementById('volume-switch-button').checked;
    return setCookie("volumeOn", playSound ? "true" : "false");
}

function setVolumeLevelCookie()
{
    var volumeLevel = document.getElementById('volume-level').value;
    return setCookie("volumeLevel", volumeLevel)
}

function getCookie(cname)
{
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setCookie(cname, cvalue)
{
    var a = new Date();
    a = new Date(a.getTime() +1000*60*60*24*365);
    document.cookie = cname+"="+encodeURIComponent(cvalue)+"; expires="+a.toGMTString()+";";
    return cvalue;
}
