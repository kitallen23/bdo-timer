@extends('layout.master')
@section('title', 'BDO Market Timer')
@section('content')
    <!-- Scripts etc. -->
    <link rel="stylesheet" href="{{ URL::asset('css/awesomplete.css') }}" />
    <script src="{{ URL::asset('js/awesomplete.js') }}" async></script>

    <script src="{{ URL::asset('js/utility.js') }}"></script>
    <script src="{{ URL::asset('js/time.js') }}"></script>
    <script src="{{ URL::asset('js/all-items.js') }}"></script>
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

    <!-- Include timer bars -->
    @foreach($all_items as $i_time => $i_data)
        @include('shared.timerbar', ['itemname' => $i_data[0], 'enhancement' => $i_data[1],
            'accumulatedtrades' => $i_data[2], 'offset' => $i_data[3], 'time' => $i_data[4],
            'next_time' => $next_items[$i_time]])
        <!-- Include item icon -->
        <div class="form-item-img form-item-img-fixed text-center" id="iconbox-{{$i_time}}" style="display:none;"
             data-toggle="tooltip" data-placement="right"
             title="{{$i_data[1]}} {{$i_data[0]}}"></div>
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


            <div class="col-xs-8 col-xs-offset-2">
                <table class="table table-hover table-bordered text-center text-muted">
                    <thead>
                    <tr>
                        <th>FS</th>
                        <th class="">Blue</th>
                        <th>Yellow</th>
                        <th>FS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="col-xs-5 table-no-content" rowspan="4"></td>
                        <td class="table-no-content"></td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="col-xs-5 table-content" rowspan="2" class="valign">+6</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="col-xs-5 table-content" rowspan="2">+7</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="col-xs-5 table-content" rowspan="3">+8</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td class="col-xs-5 table-content" rowspan="3">+8</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td class="col-xs-5 table-content" rowspan="3">+9</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td class="col-xs-5 table-content" rowspan="3">+9</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td class="col-xs-5 table-content" rowspan="2">+10</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td class="col-xs-5 table-content" rowspan="2">+10</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td class="col-xs-5 table-content" rowspan="2">+11</td>
                        <td>13</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td class="col-xs-5 table-content" rowspan="2">+11</td>
                        <td>14</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td class="col-xs-5 table-content" rowspan="2">+12</td>
                        <td>15</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td class="col-xs-5 table-content" rowspan="2">+12</td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td class="col-xs-5 table-content">+13</td>
                        <td>17</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td class="col-xs-5 table-content" rowspan="2">+14</td>
                        <td class="col-xs-5 table-content" rowspan="2">+13</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>19</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td class="col-xs-5 table-content" rowspan="3">+15 / PRI</td>
                        <td class="col-xs-5 table-content" rowspan="3">+14 / 15 / PRI</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td class="col-xs-5 table-content" rowspan="3">DUO</td>
                        <td class="col-xs-5 table-content" rowspan="5">DUO</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <td>30</td>
                    </tr>
                    <tr>
                        <td>31</td>
                        <td class="col-xs-5 table-content" rowspan="5">TRI</td>
                        <td>31</td>
                    </tr>
                    <tr>
                        <td>32</td>
                        <td>32</td>
                    </tr>
                    <tr>
                        <td>33</td>
                        <td class="col-xs-5 table-content" rowspan="6">TRI</td>
                        <td>33</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>40</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <td>41</td>
                        <td class="col-xs-5 table-content" rowspan="6">TET</td>
                        <td>41</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>49</td>
                        <td>49</td>
                    </tr>
                    <tr>
                        <td>50</td>
                        <td class="col-xs-5 table-content" rowspan="9">TET</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>54</td>
                        <td>54</td>
                    </tr>
                    <tr>
                        <td>55</td>
                        <td class="col-xs-5 table-no-content" rowspan="3"></td>
                        <td>55</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>69</td>
                        <td>69</td>
                    </tr>
                    <tr>
                        <td>70</td>
                        <td class="col-xs-5 table-content" rowspan="3">PEN</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>99</td>
                        <td>99</td>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td class="col-xs-5 table-no-content" rowspan="3"></td>
                        <td class="col-xs-5 table-content" rowspan="3">PEN</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>120</td>
                        <td>120</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- VIEW SESSION -->
            {{--<div class="col-xs-12 session-data">{{ var_dump(Session::get('items')) }}</div>--}}

        </div>
    </div>

    <script>
        $(document).ready(function(){
            // Enable tooltips
            $('[data-toggle="tooltip"]').tooltip();



            // Unhide the first timer
            document.getElementById('timerbar-{{$first_item}}').style.display = "block";
            document.getElementById('iconbox-{{$first_item}}').style.display = "block";
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
    </script>
@endsection
