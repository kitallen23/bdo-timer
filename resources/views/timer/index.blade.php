@extends('layout.master')
@section('title', 'BDO Market Timer')
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

    <div class="container">

        <div class="content">
            <!-- System time display -->
            <div class="current-time-wrapper text-center">
                <div id="current-time-hm" class="current-time-hm-large">00 00</div>
                <div id="current-time-s" class="current-time-s-large">00</div>
            </div>

            <!-- Game time display -->
            <div class="game-time-wrapper text-center">
                <div class="col-md-3 col-md-offset-3">
                    <span class="game-time-icon"><i class="fa fa-moon-o" id="day-night-icon" aria-hidden="true"></i></span>
                    <span id="game-time" class="game-time-med">00 00</span>
                </div>
                <div class="col-md-3 dim">
                    <span class="game-time-icon"><i class="fa fa-moon-o" id="day-night-changeover-icon" aria-hidden="true"></i></span>
                    <span id="game-time-to-changeover" class="game-time-med">00 00</span>
                </div>
            </div>

            <!-- Question mark section -->
            <div class="col-xs-4 col-md-offset-1"><hr /></div>
            <div class="col-xs-2 text-center" id="timer-explanation-toggle">
                <i class="fa fa-question" aria-hidden="true"></i>
            </div>
            <div class="col-xs-4"><hr /></div>

            <div class="col-md-10 col-md-offset-1" id="timer-explanation" style="display:none;">
                <div class="text-center col-xs-8 col-xs-offset-2">
                    <!-- Make headings darker..? -->
                    <h4 class="text-center text-muted">BDO Marketplace Registration Timer</h4>
                    <div class="text-center">
                        <p class="text-light">Use this timer to keep track of when marketplace items will show up.</p>
                        <p class="text-light"><span class="text-muted">Note:</span> Pearl Store items may have a different timing system.</p>
                    </div>

                    <hr />
                    <h4 class="text-center text-muted">Usage</h4>
                    <div class="text-row">
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                        <span class="text-row-item text-light">Fill out the form below.</span>
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                    </div>

                    <div class="text-row">
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                        <span class="text-row-item text-light">Relax while you're in the green.</span>
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                    </div>

                    <div class="text-row">
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                        <span class="text-row-item text-light">When the timer reaches zero, the item is in the period of time in which it can show on the market.</span>
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                    </div>

                    <div class="text-row">
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                        <span class="text-row-item text-light">Head to the market, buy the item, rejoice.</span>
                        <i class="fa fa-asterisk small-dot text-row-item text-muted" aria-hidden="true"></i>
                    </div>

                    <hr />
                    <p class="text-center col-xs-10 col-xs-offset-1 text-light"><span class="text-muted">Pro tip:</span> As soon as
                        a notification appears in-game, fill out only the item name and press ctrl+enter. This will start the
                        timer immediately, and you can edit/update the enhancement level and marketplace listings afterwards.</p>
                </div>
            </div>

            {!! Form::open(array('route' => 'timer.add','method'=>'POST', 'class'=>'f-form')) !!}
            @include('timer.form')
            {!! Form::close() !!}

            <!-- Indicator for timer -->
            <div class="row-wrapper col-xs-12" id="time-indicator-wrapper" style="display:none;">
                <div class="col-sm-10 col-sm-offset-1" id="time-indicator">
                    <div class=text-center"><hr class="hr-green"/><span class="time-indicator-text text-green">be patient</span><hr class="hr-green"/></div>
                    <div class=text-center"><hr class="hr-orange"/><span class="time-indicator-text text-dark-orange">early listing</span><hr class="hr-orange"/></div>
                    <div class=text-center"><hr class="hr-red"/><span class="time-indicator-text text-red">late listing</span><hr class="hr-red"/></div>
                    <div class=text-center"></div>
                </div>
            </div>

            @foreach($all_items as $i_time => $i_data)
                {!! Form::open(array('route' => 'timer.update','method'=>'POST', 'class'=>'i-form')) !!}
                @include('timer.item', ['itemname' => $i_data[0], 'enhancement' => $i_data[1],
                    'accumulatedtrades' => $i_data[2], 'offset' => $i_data[3], 'time' => $i_data[4]])
                {!! Form::close() !!}
            @endforeach

            <!-- VIEW SESSION -->
            {{--<div class="col-xs-12 session-data">{{ var_dump(Session::get('items')) }}</div>--}}

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.f-form').keydown(function (e) {
                if(e.ctrlKey && e.keyCode === 13 ||
                    e.keyCode === 13 && e.metaKey) {
                    $(this).submit();
                }
            });
            $('.i-form').keydown(function (e) {
                if(e.ctrlKey && e.keyCode === 13 ||
                    e.keyCode === 13 && e.metaKey) {
                    $('#i-update').trigger('click');
                }
            });
        });

        $('#timer-explanation-toggle').click(function() {
            $('#timer-explanation').slideToggle("fast");
            $('#time-indicator-wrapper').slideToggle("fast");
        });
    </script>

    @include('shared.settings')

@endsection
