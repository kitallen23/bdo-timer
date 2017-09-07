
<div class="row-wrapper col-xs-12">

    <div class="col-xs-1 form-center-h">
        <div class="form-item-removeicon text-center">
            <button class="btn-submit" type="button" onclick="clearItemForm()"><span class="glyphicon glyphicon-remove text-valign"></span></button>
        </div>
    </div>

    <div class="col-sm-10 form-item-wrapper">
        <div class="form-item-inner-wrapper">

            <div class="form-item-timer col-sm-2 form-item text-center">
                <div class="form-center-h">
                    <span>-10:00</span>
                </div>
            </div>

            <div class="form-item col-sm-4">
                <div class="form-item-img text-center" id="iconbox"></div>
                <input type="text" class="btn-new form-control awesomplete truncate"
                        id="input-itemname" name="itemname" placeholder="&#xf002;"
                        style="font-family:'Open Sans',FontAwesome" spellcheck="false"
                        list="item-list" data-autofirst="true" />
                @include('timer.itemlist')
            </div>

            <div class="col-sm-2 form-item-enhancement form-item">
                <div class="form-center-h">
                    <select class="btn-new form-control set-width-input" name="enhancement"
                            id="input-enhancement" onchange="setEnhancement(this.value, 'iconbox')">
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
                    <div class="form-item-texticon text-center" data-toggle="tooltip" data-placement="top"
                         title="Current marketplace listings (helps you ensure the item hasn't sold while you weren't looking)"
                    >
                        <span class="glyphicon glyphicon-list text-valign accumulated-trades"></span>
                    </div>
                    <input type="number" class="btn-new form-control set-width-input" id="input-accumulatedtrades" name="accumulatedtrades" />
                </div>
            </div>

            <div class="col-sm-2 form-item-offset form-item">
                <div class="form-center-h">
                    <div class="form-item-texticon text-center" data-toggle="tooltip" data-placement="top"
                         title="Time offset (e.g. item popped up 2 minutes ago, so select '2 mins')"
                    >
                        <span class="glyphicon glyphicon-time text-valign"></span>
                    </div>
                    <select id="input-offset" class="btn-new form-control set-width-input" name="offset" >
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

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <!-- Submit form -->
    <div class="col-xs-1 form-center-h">
        <div class="form-item-submiticon text-center">
            <button type="submit" class="btn-submit"><span class="glyphicon glyphicon-ok text-valign"></span></button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        document.getElementById('input-itemname').addEventListener("awesomplete-selectcomplete", function(event) {
            setIconImage(event.text);
        });
    });
    $('#input-itemname').focusout(function(){
        setIconImage(this.value);
    });
    function setIconImage(itemname)
    {
        var _name = itemname.replace(/[^a-z]/gi, '');
        document.getElementById('iconbox').style.background = '#222 url("img/'+_name+'.png") no-repeat center';
    }
</script>