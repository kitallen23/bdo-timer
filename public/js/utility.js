
// Add enhancement text to icon
function setEnhancement(enhancement, idToChange)
{
    var iconbox = document.getElementById(idToChange);
    if(enhancement.charAt(0) !== '+')
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
    else if(enhancement === '+0')
    {
        iconbox.innerHTML = '';
    }
    else
    {
        iconbox.innerHTML = enhancement;
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
