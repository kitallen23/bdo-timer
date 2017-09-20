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
                <button type="submit" class="btn-submit btn-submit-red" name="submit" value="remove" tabindex="1">
                    <span class="glyphicon glyphicon-remove text-valign"></span>
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    @endforeach

    <div class="container">

        <div class="content">
            <div class="current-time-wrapper text-center">
                <div id="current-time-hm">00 00</div>
                <div id="current-time-s">00</div>
            </div>


            {!! Form::open(array('route' => 'scratch.add','method'=>'POST')) !!}
            <div class="scratch-wrapper col-md-8 col-md-offset-2">

                <!-- Clear form -->
                <div class="col-md-1 form-center-h">
                    <div class="form-item-removeicon text-center">
                        <button class="btn-submit btn-submit-red" type="button" onclick="clearScratchForm()" tabindex="4">
                            <span class="glyphicon glyphicon-remove text-valign"></span>
                        </button>
                    </div>
                </div>

                <div class="col-md-10 scratch-form-wrapper">

                    <div class="col-md-12 scratch-form-inner-wrapper">
                        <input type="text" class="form-control scratch-input-title" tabindex="1"
                                name="s_title" placeholder="Title"/>
                    </div>
                    <div class="col-md-12 scratch-form-inner-wrapper">
                        <textarea class="form-control scratch-input-comment" tabindex="2"
                                placeholder="Help, I lost my memory..."
                                rows="2" name="s_comment" data-autoresize required ></textarea>
                    </div>
                </div>


                <!-- Submit form -->
                <div class="col-md-1 form-center-h">
                    <div class="form-item-submiticon text-center">
                        <button type="submit" class="btn-submit btn-submit-green" tabindex="3">
                            <span class="glyphicon glyphicon-ok text-valign"></span>
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}











            <div class="col-xs-8 col-xs-offset-2 text-center">
            @foreach($all_comments as $c_time => $c_data)
                <div>Time: {{$c_time}}, Title: {{$c_data[0]}}, Comment: {{$c_data[1]}}</div>
            @endforeach

            </div>

            <!-- VIEW SESSION -->
            {{--<div class="col-xs-12 session-data">{{ var_dump(Session::get('items')) }}</div>--}}

        </div>
    </div>

    @include('shared.settings')

    <script>
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

        });

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

            var resizeTextarea = function(el) {
                jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
            };
            jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
        });
    </script>
@endsection
