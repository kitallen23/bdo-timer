@extends('layout.master')
@section('title', 'Scratchpad')
@section('content')
    <!-- Scripts etc. -->
    <link rel="stylesheet" href="{{ URL::asset('css/awesomplete.css') }}" />
    <script src="{{ URL::asset('js/awesomplete.js') }}" async></script>

    <script src="{{ URL::asset('js/utility.js') }}"></script>
    <script src="{{ URL::asset('js/time.js') }}"></script>
    <script src="{{ URL::asset('js/all-items.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.color-2.1.2.js') }}"></script>

    <audio id="audio-notification">
        <source src="{{ URL::asset('audio/notification02_tim.mp3')  }}" type="audio/mpeg">
    </audio>

    <div class="col-xs-12 timerbar-wrapper">
        <div class="progress col-xs-12 progress-custom-lg" id="timerbar-default" style="display:none;"></div>
    </div>

    <div class="container">

        <div class="content">
            <!-- System time display -->
            <div class="current-time-wrapper-sm text-center">
                <div id="current-time-hm" class="current-time-hm-small">00 00</div>
                <div id="current-time-s" class="current-time-s-small">00</div>
            </div>

            <!-- Game time display -->
            <div class="game-time-wrapper text-center">
                <div class="col-md-3 col-md-offset-3">
                    <span class="game-time-icon-sm"><i class="fa fa-moon-o" id="day-night-icon" aria-hidden="true"></i></span>
                    <span id="game-time" class="game-time-sm">00 00</span>
                </div>
                <div class="col-md-3 dim">
                    <span class="game-time-icon-sm"><i class="fa fa-moon-o" id="day-night-changeover-icon" aria-hidden="true"></i></span>
                    <span id="game-time-to-changeover" class="game-time-sm">00 00</span>
                </div>
            </div>



            <p class="text-muted text-center">Keep notes of stuff.</p>
            {!! Form::open(array('route' => 'scratch.add', 'method'=>'POST', 'class'=>'scratch-form')) !!}
            <div class="scratch-wrapper col-md-8 col-md-offset-2">

                <!-- Clear form -->
                <div class="col-md-1 scratch-form-center-h">
                    <div class="form-scratch-removeicon text-center">
                        <button class="btn-submit btn-submit-red" type="button" onclick="clearScratchForm()" tabindex="4">
                            <span class="glyphicon glyphicon-remove text-valign"></span>
                        </button>
                    </div>
                </div>

                <div class="col-md-10 scratch-form-wrapper">
                    <div class="col-md-12 scratch-form-inner-wrapper">
                        <input type="text" class="form-control scratch-input-title" tabindex="1"
                              name="s_title" placeholder="Title" id="scratch-title" spellcheck="false" />
                    </div>
                    <div class="col-md-12 scratch-form-inner-wrapper">
                        <textarea class="form-control scratch-input-comment" tabindex="2"
                                placeholder="..." rows="2" name="s_comment" id="scratch-comment"
                                spellcheck="false" data-autoresize ></textarea>
                    </div>
                </div>


                <!-- Submit form -->
                <div class="col-md-1 scratch-form-center-h">
                    <div class="form-scratch-submiticon text-center">
                        <button type="submit" class="btn-submit btn-submit-green" tabindex="3">
                            <span class="glyphicon glyphicon-ok text-valign"></span>
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

            @foreach($all_comments as $c_time => $c_data)
                <div class="col-xs-12 no-spacing">
                    {!! Form::open(array('route' => 'scratch.update','method'=>'POST', 'id'=>'f-'.$c_time)) !!}
                    @include('scratch.comment', ['title' => $c_data[0], 'comment' => $c_data[1], 'time' => $c_time])
                    {!! Form::close() !!}
                </div>
            @endforeach

            <!-- VIEW SESSION -->
            {{--<div class="col-xs-12 session-data">{{ var_dump(Session::get('items')) }}</div>--}}

        </div>
    </div>

    <!-- Include timer bars -->
    @foreach($all_items as $i_time => $i_data)
        @include('shared.timerbar', ['itemname' => $i_data[0], 'enhancement' => $i_data[1],
            'accumulatedtrades' => $i_data[2], 'offset' => $i_data[3], 'time' => $i_data[4],
            'next_time' => $next_items[$i_time]])
        <!-- Include item icon -->
        <a href="{{url('/')}}" class="icon-link">
            <div class="form-item-img form-item-img-fixed text-center"
                 id="iconbox-{{$i_time}}" style="display:none;" data-toggle="tooltip"
                 data-placement="right"
                 title="{{$i_data[0]}}"></div>
        </a>
        <div class="fixed-button-wrapper" id="form-{{$i_time}}" style="display:none;">
            {!! Form::open(array('route' => 'timer.update','method'=>'POST')) !!}
            <input type="hidden" name="time" value="{{ $i_time }}">
            <div class="fixed-button-removeicon text-center">
                <button type="submit" class="btn-submit btn-submit-red" name="submit" value="remove">
                    <span class="glyphicon glyphicon-remove text-valign"></span>
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    @endforeach

    @include('shared.settings')

    <script>
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        var resizeTextarea = function(el, offset)
        {
            jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };

        var setTimestamps = function()
        {
            jQuery.each($('*[data-timestamp]'), function()
            {
                var ts = $(this).data("timestamp");
                var tsDateTime = new Date(ts*1000);
                var currDateTime = new Date();

                var time = getTimeStringHM(tsDateTime.getHours(), tsDateTime.getMinutes());

                var date = "today";
                var isToday = (currDateTime.toDateString() === tsDateTime.toDateString());
                if(!isToday)
                {
                    var yesterdayDateTime = new Date();
                    yesterdayDateTime.setDate(yesterdayDateTime.getDate() - 1);
                    if((yesterdayDateTime.toDateString() === tsDateTime.toDateString()))
                    {
                        date = "yesterday";
                    }
                    else
                    {
                        date = tsDateTime.getDate()+" "+monthNames[tsDateTime.getMonth()];
                    }
                }

                $(this).find(".datetime").text(time+", "+date);
            });
        };

        $(document).ready(function(){
            // Enable tooltips
            $('[data-toggle="tooltip"]').tooltip();

            // Unhide the first timer
            if(!!document.getElementById('timerbar-{{$first_item}}'))
                document.getElementById('timerbar-{{$first_item}}').style.display = "block";
            if(!!document.getElementById('iconbox-{{$first_item}}'))
                document.getElementById('iconbox-{{$first_item}}').style.display = "block";
            if(!!document.getElementById('form-{{$first_item}}'))
                document.getElementById('form-{{$first_item}}').style.display = "block";

            jQuery.each(jQuery('textarea[data-autoresize]'), function() {
                var offset = this.offsetHeight - this.clientHeight;
                resizeTextarea(this, offset);
            });

            setTimestamps();

            // Flash when no data was entered in comment box
            $(".scratch-form").submit(function(f) {
                var comment = $(this).find('.scratch-input-comment').val();
                var title = $(this).find('.scratch-input-title').val();

                if(!comment.trim() && !title.trim())
                {
                    $(this).find('.scratch-input-comment').focus();
                    $(this).find('.scratch-input-comment').css("background-color", "#fdba4e").animate({backgroundColor:"transparent"}, 500);

                    f.preventDefault();
                    return false;
                }
            });
            $('.scratch-form').keydown(function (e) {

                if(e.ctrlKey && e.keyCode === 13 ||
                    e.keyCode === 13 && e.metaKey) {
                    $(this).submit();
                }
            });
        });

        // Update timestamps on time change
        $('#time-format-button').change(function() {
            setTimestamps();
        });

        // Display title bar on focus in, hide on focus out
        $('.scratch-comment-wrapper').on('focusin', function() {
            showTitleBar(this);
            $(this).data("focus", true);
        });
        $('.scratch-comment-wrapper').on('focusout', function() {

            var t_this = this;
            setTimeout(function() {
                hideTitleBar(t_this);
            }, 0);
        });
        function showTitleBar(el)
        {
            if($(el).data("focus") === false)
            {
                // Add border and unhide title bar
                $(el).find('textarea[data-autoresize]').css("border-top", "1px solid #424242");
                $(el).find('.scratch-input-title').css("display", "block");
            }
        }
        function hideTitleBar(el)
        {
            if($(el).data("focus") === true)
            {
                if(!$("*:focus").is($(el).find('.scratch-input-title')) &&
                    !$("*:focus").is($(el).find('.scratch-input-comment')))
                {
                    if($(el).find('.scratch-input-title').val() === "")
                    {
                        $(el).find('textarea[data-autoresize]').css("border-top", "0");
                        $(el).find('.scratch-input-title').css("display", "none");
                    }
                    $(el).data("focus", false);
                }
            }
        }

        // Start all timers
        @foreach($all_items as $i_time => $i_data)
        $(document).ready(function(){
            updateTimerbar{{$i_time}}();
            setIconImage("iconbox-{{$i_time}}", "{{$i_data[0]}}");
            setEnhancement("{{$i_data[1]}}", 'iconbox-{{$i_time}}');
        });
        @endforeach

        // Autosave feature
        var saveTimeout;
        var toSave;
        function saveForm(el)
        {
            if($(el).data("savetime") <= new Date().getTime())
            {
                var ts = $(el).parents('.scratch-wrapper').find('.hidden-time').val();
                autosave("f-"+ts);
            }
        }
        $('.autosave').on('keyup', function(e) {
            // Ensure we initialise the form to save
            if(!toSave)
            {
                toSave = this;
            }
            // Save the form with the existing document object if we're now editing another comment
            if(toSave !== this)
            {
                $(toSave).data("savetime", (new Date().getTime()));
                saveForm(toSave);
            }

            $(this).data("savetime", (new Date().getTime())+2000);
            toSave = this;
            clearTimeout(saveTimeout);
            saveTimeout = setTimeout(function () {
                saveForm(toSave);
            }, 3000);
        });
        function autosave(formID)
        {
            console.log("Autosave beginning...");
            var fid = '#'+formID;
            // Display saving icon etc.
            $(fid).find(".autosave-message-wrapper").css("display", "inline");
            $(fid).find(".small-icon").removeClass("glyphicon-ok").addClass("glyphicon-repeat").addClass("fast-right-spinner");
            $(fid).find(".autosave-text").html("saving...");

            $.ajax({
                type:'POST',
                url:'{{url("scratch/autosave")}}',
                data: $(fid).serialize(),
                dataType: 'json',
                success:function(data){
                    console.log(data.msg);
                    $(fid).find(".small-icon").removeClass("glyphicon-repeat").removeClass("fast-right-spinner").addClass("glyphicon-ok");
                    $(fid).find(".autosave-text").html("saved");

                    // Modify timestamp form field
                    $(fid).find(".hidden-time").val(data.newtime);

                    // Modify data-timestamp value
                    $(fid).find('*[data-timestamp]').data('timestamp', data.newtime);

                    // Modify form's ID
                    $(fid).attr('id','f-'+data.newtime);

                    // Re-render the timestamps
                    setTimestamps();

                    // Clean up
                    toSave = null;

                    setTimeout(function () {
                        $('#f-'+data.newtime).find(".autosave-message-wrapper").fadeOut("slow");
                    }, 1500);
                }
            });
        }
        // Hide empty forms
        $('.autosave').on('focusout', function() {
            if($(this).parents('.scratch-wrapper').find('.scratch-input-comment').val() === "" &&
                $(this).parents('.scratch-wrapper').find('.scratch-input-title').val() === "")
            {
                $(this).parents('.no-spacing').slideUp(200);
            }
        });

        $(window).bind('beforeunload', function(){
            if(toSave)
            {
                var ts = $(toSave).parents('.scratch-wrapper').find('.hidden-time').val();
                autosave("f-"+ts);
                clearTimeout(saveTimeout);
                return 'Changes have not yet been saved.';
            }
        });

        // Enable autoresizing of text boxes
        jQuery.each(jQuery('textarea[data-autoresize]'), function() {
            var offset = this.offsetHeight - this.clientHeight;
            jQuery(this).on('keyup input', function() {
                resizeTextarea(this, offset);
            });
        });
    </script>
@endsection
