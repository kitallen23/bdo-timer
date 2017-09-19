@extends('layout.master')
@section('title', 'BDO Market Timer')
@section('content')
    <!-- Scripts etc. -->
    <link rel="stylesheet" href="{{ URL::asset('css/awesomplete.css') }}" />
    <script src="{{ URL::asset('js/awesomplete.js') }}" async></script>

    <script src="{{ URL::asset('js/utility.js') }}"></script>
    <script src="{{ URL::asset('js/time.js') }}"></script>
    <script src="{{ URL::asset('js/all-items.js') }}"></script>

    <div class="col-xs-12 settings-button">
        <label class="switch">
            <input type="checkbox" id="time-format-button" onchange="setTimeFormatCookie();">
            <div class="slider"><div class="slider-l">24h</div><div class="slider-r text-right">12h</div></div>
        </label><br />
    </div>

    <div class="col-xs-12 settings-button">
        <label class="switch">
            <input type="checkbox" id="volume-switch-button" onchange="setVolumeSwitchCookie();">
            <div class="slider">
                <div class="slider-l"><i class="fa fa-volume-off"></i></div><div class="slider-r text-right"><i class="fa fa-volume-up"></i></div>
            </div>
        </label><br />
    </div>

    <div class="container">

        <div class="content">
            <!-- System time display -->
            <div class="current-time-wrapper text-center">
                <div id="current-time-hm">00 00</div>
                <div id="current-time-s">00</div>
            </div>

            <!-- Game time display -->
            <div class="game-time-wrapper text-center">
                <div class="col-md-3 col-md-offset-3">
                    <span class="game-time-icon"><i class="fa fa-moon-o" id="day-night-icon" aria-hidden="true"></i></span>
                    <span id="game-time">00 00</span>
                </div>
                <div class="col-md-3 dim">
                    <span class="game-time-icon"><i class="fa fa-moon-o" id="day-night-changeover-icon" aria-hidden="true"></i></span>
                    <span id="game-time-to-changeover">00 00</span>
                </div>
            </div>

            <!-- Question mark section -->
            <div class="col-xs-4 col-md-offset-1"><hr /></div>
            <div class="col-xs-2 text-center" id="timer-explanation-toggle">
                <i class="fa fa-question big-qn" aria-hidden="true"></i>
            </div>
            <div class="col-xs-4"><hr /></div>

            <div class="col-md-10 col-md-offset-1" id="timer-explanation" style="display:none;">
                <div class="text-center col-xs-8 col-xs-offset-2">
                    <!-- Make headings darker..? -->
                    <h4 class="text-center text-muted">BDO Marketplace Registration Timer</h4>
                    <div class="text-center">
                        <p>Use this timer to keep track of when marketplace items will show up.</p>
                        {{--<p>For regular items, the item could list on the market as soon as the timer hits 0.</p>--}}
                        {{--<p>In the average case, the item will show up when the timer hits 5:00.</p>--}}
                        <p><span class="text-muted">Note:</span> Pearl Store items may have a different timing system.</p>
                    </div>

                    <hr />
                    <h4 class="text-center text-muted">Usage</h4>
                    <div class="text-row">
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                        <span class="text-row-item">Fill out the form below.</span>
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                    </div>

                    <div class="text-row">
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                        <span class="text-row-item">Relax while you're in the green.</span>
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                    </div>

                    <div class="text-row">
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                        <span class="text-row-item">When the timer reaches zero, the item is in the period of time in which it can show on the market.</span>
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                    </div>

                    <div class="text-row">
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                        <span class="text-row-item">Head to the market, buy the item, rejoice.</span>
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                    </div>

                    <hr />
                    <p class="text-center col-xs-8 col-xs-offset-2"><span class="text-muted">Pro tip:</span> As soon as a notification appears in-game, enter
                    the item name and press enter. This will start the timer immediately, and you can edit/update the
                    enhancement level and marketplace listings afterwards.</p>
                </div>
            </div>

            {!! Form::open(array('route' => 'timer.add','method'=>'POST')) !!}
            @include('timer.form')
            {!! Form::close() !!}

            @foreach($all_items as $i_time => $i_data)

                {!! Form::open(array('route' => 'timer.update','method'=>'POST')) !!}
                @include('timer.item', ['itemname' => $i_data[0], 'enhancement' => $i_data[1],
                    'accumulatedtrades' => $i_data[2], 'offset' => $i_data[3], 'time' => $i_data[4]])
                {!! Form::close() !!}
            @endforeach

            <!-- VIEW SESSION -->
            {{--<div class="col-xs-12 session-data">{{ var_dump(Session::get('items')) }}</div>--}}

        </div>
    </div>

    <script>
        $('#timer-explanation-toggle').click(function() {
            $('#timer-explanation').slideToggle("fast");
        })
    </script>
@endsection
