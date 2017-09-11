
// Add enhancement text to icon
function setEnhancement(enhancement, idToChange)
{
    var iconbox = document.getElementById(idToChange);
    if(enhancement.charAt(0) !== '-')
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
    else if(enhancement === '+0' || enhancement === '-')
    {
        iconbox.innerHTML = '';
    }
    else
    {
        iconbox.innerHTML = enhancement;
    }
}

function setIconImage(elementID, itemname)
{
    var _name = itemname.replace(/[^a-z]/gi, '').toLowerCase();
    document.getElementById(elementID).style.background = '#222 url("img/'+_name+'.png") no-repeat center';

    if(orangeItems.indexOf(itemname.replace(/&#039;/g, "'")) > -1)
    {
        document.getElementById(elementID).style.border = '1px solid #ff5e14';
    }
    else if(yellowItems.indexOf(itemname.replace(/&#039;/g, "'")) > -1)
    {
        document.getElementById(elementID).style.border = '1px solid gold';
    }
    else if(blueItems.indexOf(itemname.replace(/&#039;/g, "'")) > -1)
    {
        document.getElementById(elementID).style.border = '1px solid #0099ff';
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
    document.cookie = cname+"="+cvalue+"; expires="+a.toGMTString()+";";
    return cvalue;
}
