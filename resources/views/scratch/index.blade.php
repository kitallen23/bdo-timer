@extends('layout.master')
@section('title', 'Scratchpad')
@section('content')
    <!-- Scripts etc. -->
    <link rel="stylesheet" href="{{ URL::asset('css/awesomplete.css') }}" />
    <script src="{{ URL::asset('js/awesomplete.js') }}" async></script>

    <script src="{{ URL::asset('js/utility.js') }}"></script>
    <script src="{{ URL::asset('js/time.js') }}"></script>
    <script src="{{ URL::asset('js/all-items.js') }}"></script>

    <audio id="audio-notification">
        <source src="{{ URL::asset('audio/notification02_tim.mp3')  }}" type="audio/mpeg">
    </audio>

    <style>
        #current-time-hm
        {
            font-size: 4em;
            font-weight: 300;
        }
        #current-time-s
        {
            font-size: 1em;
            font-weight: 300;
            margin-left: 8px;
        }
        .current-time-wrapper
        {
            margin-bottom: 40px;
        }
    </style>

    <div class="col-xs-12 timerbar-wrapper">
        <div class="progress col-xs-12 progress-custom-lg" id="timerbar-default" style="display:none;"></div>
    </div>

    <div class="container">

        <div class="content">
            <div class="current-time-wrapper text-center">
                <div id="current-time-hm">00 00</div>
                <div id="current-time-s">00</div>
            </div>

            <p class="text-muted text-center">Keep notes of stuff.</p>
            {!! Form::open(array('route' => 'scratch.add','method'=>'POST')) !!}
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
                                spellcheck="false" data-autoresize required ></textarea>
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
                {!! Form::open(array('route' => 'scratch.update','method'=>'POST')) !!}
                @include('scratch.comment', ['title' => $c_data[0], 'comment' => $c_data[1], 'time' => $c_time])
                {!! Form::close() !!}
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
        <div class="form-item-img form-item-img-fixed text-center" id="iconbox-{{$i_time}}" style="display:none;"
             data-toggle="tooltip" data-placement="right"
             title="{{$i_data[0]}}"></div>
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
        });

        // Display title bar on focus in
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
                $(el).find('textarea[data-autoresize]').css("border-top", "1px solid red");
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

        jQuery.each(jQuery('textarea[data-autoresize]'), function() {
            var offset = this.offsetHeight - this.clientHeight;
            jQuery(this).on('keyup input', function() { resizeTextarea(this, offset); }).removeAttr('data-autoresize');
        });
    </script>
@endsection
