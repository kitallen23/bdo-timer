@extends('layout.master')
@section('title', 'BDO Market Timer')
@section('content')
    <!-- Scripts etc. -->
    <link rel="stylesheet" href="{{ URL::asset('css/awesomplete.css') }}" />
    <script src="{{ URL::asset('js/awesomplete.js') }}" async></script>

    <script src="{{ URL::asset('js/time.js') }}"></script>
    <script src="{{ URL::asset('js/utility.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">

    @php
        $yellow = array(
                "Giath's Helmet",
                "Bheg's Gloves",
                "Dim Tree Spirit's Armor",
                "Red Nose's Armor",
                "Muskan's Shoes",

                "Kzarka Longsword",
                "Kzarka Longbow",
                "Kzarka",
                "Kzarka Axe",
                "Kzarka Shortsword",
                "Kzarka Blade",
                "Kzarka Staff",
                "Kzarka Kriegsmesser",
                "Kzarka Gauntlet",

                "Nouver Shield",
                "Nouver Dagger",
                "Nouver Talisman",
                "Nouver Ornamental Knot",
                "Nouver Trinket",
                "Nouver Horn Bow",
                "Nouver Kunai",
                "Nouver Shuriken",
                "Nouver Vambrace",

                "Kutum Shield",
                "Kutum Dagger",
                "Kutum Talisman",
                "Kutum Ornamental Knot",
                "Kutum Trinket",
                "Kutum Horn Bow",
                "Kutum Kunai",
                "Kutum Shuriken",
                "Kutum Vambrace",

                "Dandelion Great Sword",
                "Dandelion Scythe",
                "Dandelion Iron Buster",
                "Dandelion Kamasylven Sword",
                "Dandelion Celestial Bo Staff",
                "Dandelion Lancia",
                "Dandelion Crescent Blade",
                "Dandelion Kerispear",
                "Dandelion Sura Katana",
                "Dandelion Sah Chakram",
                "Dandelion Aad Sphera",
                "Dandelion Godr Sphera",
                "Dandelion Vediant",
                "Dandelion Garbrace",
            );
    @endphp

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


        @if(Session::has('items'))
            @foreach(Session::get('items') as $item)

                {!! Form::open(array('route' => 'timer.update','method'=>'POST')) !!}
                @include('timer.item', ['itemname' => $item[0][0], 'enhancement' => $item[0][1],
                    'accumulatedtrades' => $item[0][2], 'offset' => $item[0][3], 'time' => $item[0][4]])
                {!! Form::close() !!}
            @endforeach
        @endif

        <!-- VIEW SESSION -->
        {{--<div class="col-xs-12 session-data">{{ var_dump(Session::get('items')) }}</div>--}}

    </div>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
