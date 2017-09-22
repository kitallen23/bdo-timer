@extends('layout.master')
@section('title', '404')
@section('content')
    <!-- Scripts etc. -->

    <div class="col-xs-12 timerbar-wrapper">
        <div class="progress col-xs-12 progress-custom-lg" id="timerbar-default" style="display:none;"></div>
    </div>

    <div class="container">

        <div class="content">


            {{--<div class="col-xs-8 col-xs-offset-2 text-center" style="margin-top:200px;">--}}
            <div class="col-xs-8 col-xs-offset-2 text-center" style="margin-top:90px;">
                <h1>404 error</h1>

                <h4 style="margin-top:40px;">This NPC is not in place currently. Please come back between 5 AM and 7 PM.</h4>
                <img src="{{URL::asset('img/err/404.png')}}" style="margin-top:40px;" width="350" />

            </div>

            <!-- VIEW SESSION -->
            {{--<div class="col-xs-12 session-data">{{ var_dump(Session::get('items')) }}</div>--}}

        </div>
    </div>
@endsection
