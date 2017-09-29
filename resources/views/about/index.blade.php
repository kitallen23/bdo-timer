@extends('layout.master')
@section('title', 'About')
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


            <div class="col-xs-8 col-xs-offset-2">

                <h3 class="text-muted">About</h3>
                <p class="text-light">I like keeping everything in one place. I like anything that can assist (or
                    replace) my horrible memory. I like cats. And I dislike missing items on the market because I was
                    busy looking at pictures of cats. That's why I built this website - and I hope you'll find it as
                    useful as I do.</p>

                <h3 class="text-muted">Guild</h3>
                <p class="text-light">&lt;Ohai_Otaku&gt; is a small guild on NA servers. We're always looking for
                    friendly new players of all skill and experience levels. If you're interested in joining,
                    either shoot me an email, or contact one of us in-game: me (main:
                    <span class="text-orange">Tims_Buddy</span>, family: <span class="text-orange">Zsatei</span>), our
                    "One True Leader" Nich (main:
                    <span class="text-orange">Nikolas</span>, family: <span class="text-orange">Truheart</span>), or
                    <strike class="text-muted">the village idiot</strike> Tim (main:
                    <span class="text-orange">Ar_Tard</span>, family: <span class="text-orange">Tzharr</span>).
                    Alternatively, leave us a guestbook comment and we'll get back to you.</p>
                <p class="text-light">I'd like to thank Nich & Tim for their ongoing help with creating this website. It wouldn't be half
                    as good if they hadn't given me amazing suggestions and kept me on-track.
                    <span class="glyphicon glyphicon-heart"></span></p>

                <h3 class="text-muted">Donate</h3>
                <p class="text-light">If you enjoy this website and have a few extra dollarydoos lying around, please
                    consider donating. This will go a long way towards covering the ongoing costs of hosting
                    and maintaining the website.</p>
                <p class="text-light text-muted">Full disclosure: some donations may be used to purchase coffee, which
                    I will convert into source code.</p>
                <div class="text-center text-orange">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="6FH4D4ATR7BUW">
                        <button type="submit" class="btn btn-warning btn-donate">Donate</button>
                    </form>
                </div>

                <h3 class="text-muted">Contribution</h3>
                <p class="text-light">I rely heavily on feedback from all of you. Please send an email to
                    <span class="text-orange">bdotimer.ohaiotaku@gmail.com</span> if you have any suggestions at all.
                    Or if you find any issues with the website. Or even if you're just feeling a lil' lonely.</p>
                {{--<p class="text-light">Tell me what you like, and what you dislike. </p>--}}
                <p class="text-light">Specifically, I'm looking for suggestions on:</p>
                <div class="text-light lnk-row">
                    <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>More helpful guides, websites etc. for the links page
                </div>
                <div class="text-light lnk-row">
                    <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>Updated class guides for the links page
                </div>
                <div class="text-light lnk-row">
                    <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>Ideas for more tools to create
                </div>
                <div class="text-light lnk-row">
                    <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>Items you'd like added to the timer
                </div>

                <h3 class="text-muted">Notable Mentions</h3>
                <p class="text-light">I'd like to thank
                    <a target="_blank" href="http://www.somethinglovely.net/bdo/" class="lnk">Famme</a>
                    for his amazing BDO tools, which were a great inspiration for me.</p>
                <p class="text-light">All item icons came from the amazing
                    <a target="_blank" href="http://bddatabase.net/us/" class="lnk">Black Desert Database</a>.
                </p>

            </div>

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
                <button type="submit" class="btn-submit btn-submit-red" name="submit" value="remove" tabindex="1">
                    <span class="glyphicon glyphicon-remove text-valign"></span>
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    @endforeach

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
    </script>
@endsection
