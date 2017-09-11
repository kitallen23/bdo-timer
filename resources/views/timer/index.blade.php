@extends('layout.master')
@section('title', 'BDO Market Timer')
@section('content')
    <!-- Scripts etc. -->
    <link rel="stylesheet" href="{{ URL::asset('css/awesomplete.css') }}" />
    <script src="{{ URL::asset('js/awesomplete.js') }}" async></script>

    <script src="{{ URL::asset('js/utility.js') }}"></script>
    <script src="{{ URL::asset('js/time.js') }}"></script>
    <script src="{{ URL::asset('js/all-items.js') }}"></script>

    <div class="col-xs-12 time-format-buttons">

        <label class="switch">
            <input type="checkbox" id="time-format-button" onchange="setTimeFormatCookie();">
            <div class="slider"><div class="slider-l">24h</div><div class="slider-r text-right">12h</div></div>
        </label>
    </div>

    <div class="container">

        <div class="content">
            <div class="current-time-wrapper text-center">
                <div id="current-time-hm">00 00</div>
                <div id="current-time-s">00</div>
            </div>

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
@endsection
