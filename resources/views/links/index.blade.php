@extends('layout.master')
@section('title', 'Helpful Links')
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


            <div class="col-xs-8 col-xs-offset-2">
                <h2 class="text-center text-muted">Helpful Links</h2>

                <div class="btn-group col-xs-12 btn-group-new extra-spacing" id="btn-group-links">
                    <button type="button" class="btn btn-new3 col-xs-4 active" id="btn-lnk-general">General</button>
                    <button type="button" class="btn btn-new3 col-xs-4" id="btn-lnk-def">Character</button>
                    <button type="button" class="btn btn-new3 col-xs-4" id="btn-lnk-ghi">Lifeskills</button>
                </div>

                {{--<h3 class="text-muted">Must Haves <i class="fa fa-heart" aria-hidden="true"></i></h3>--}}

                <div class="table-wrapper" id="links-general">
                    <h3 class="text-muted">Fundamentals</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://www.somethinglovely.net/bdo/" class="lnk">Famme's somethinglovely map</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="https://community.blackdesertonline.com/index.php" class="lnk">Official BDO forum</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://dulfy.net/category/bdo/" class="lnk">Dulfy's BDO archive</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/" class="lnk">BDFoundry</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://bddatabase.net/us/" class="lnk">Black Desert Database</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://urzasarchives.com/bdo/wbtbdo/" class="lnk">World Boss Timer</a>
                    </div>

                    <hr />
                    <h3 class="text-muted">Miscellaneous</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://bdotools.com/" class="lnk">Amity Calculator</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://dulfy.net/2016/03/18/black-desert-pets-and-pet-food-guide/" class="lnk">Pets and Pet Food Guide (Dulfy)</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://dulfy.net/2016/03/23/black-desert-new-pet-breeding-system-guide/" class="lnk">Pet Breeding Guide (Dulfy)</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://dulfy.net/2017/01/18/black-desert-fame-levels-and-payout-guide/" class="lnk">Fame Guide (Dulfy)</a>
                    </div>

                </div>

                <div class="table-wrapper" id="links-def" style="display:none;">
                    <h3 class="text-muted">Class Guides</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Warrior:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/warrior-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="http://bddatabase.net/us/skillcalc/30493/" class="lnk">skill build</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Ranger:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/ranger-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="https://docs.google.com/document/d/1jQ0MuIafb9hAgEqHhkAUd4APxl3h9i_RVJtZjAUDBLI/edit#" class="lnk">Google Doc</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Sorceress:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/ranger-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="https://community.blackdesertonline.com/index.php?threads/sorceress-guide.13675/" class="lnk">forum guide</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Berserker:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/berserker-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="http://forum.blackdesertonline.com/index.php?/topic/35771-guide-berserker-road-to-60-update-29-july-including-google-doc/" class="lnk">forum guide</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Tamer:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/tamer-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="https://www.reddit.com/r/blackdesertonline/comments/667q4n/tamer_guide_by_trollsies/" class="lnk">reddit guide</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Valkyrie:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/valkyrie_class_guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="http://forum.blackdesertonline.com/index.php?/topic/58303-01282017-update-the-ultimate-valkyrie-gearskillcombo-guide/" class="lnk">forum guide</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Musa:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/blader-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="http://bddatabase.net/us/skillcalc/25412/" class="lnk">skill build</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Maehwa:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/plum-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="https://community.blackdesertonline.com/index.php?threads/comprehensive-maewha-guide-by-angwar.3248/" class="lnk">forum guide</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Wizard:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/wizard-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="https://www.invenglobal.com/articles/724/bdo-guide-witch-wizard-pre-awakening-basics" class="lnk">pre-awakening skill guide</a>,
                        <a target="_blank" href="https://www.invenglobal.com/articles/669/bdo-guide-wizard-awakening-basics" class="lnk">awakening skill guide</a>,
                        <a target="_blank" href="http://bddatabase.net/us/skillcalc/28813/" class="lnk">skill build</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Witch:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/witch-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="https://www.invenglobal.com/articles/1583/black-desert-online-skill-build-guide-for-witch-newbies-and-possibly-wizards-before-pre-awakening" class="lnk">skill guide</a>,
                        <a target="_blank" href="http://bddatabase.net/us/skillcalc/55507/" class="lnk">skill build</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Kunoichi:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/kunoichi-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="https://community.blackdesertonline.com/index.php?threads/nayrikos-ninja-kunoichi-guide.2174/" class="lnk">forum guide</a>,
                        <a target="_blank" href="https://www.invenglobal.com/articles/1475/bdo-guide-kunoichi-pre-awakeningawakening-skill-build" class="lnk">skill guide</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Ninja:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/ninja-class-guide/" class="lnk">BDFoundry guide</a>,
                        <a target="_blank" href="https://community.blackdesertonline.com/index.php?threads/nayrikos-ninja-kunoichi-guide.2174/" class="lnk">forum guide #1</a>,
                        <a target="_blank" href="https://www.reddit.com/r/blackdesertonline/comments/5nrflo/bgs_guide_to_ninja/" class="lnk">forum guide #2</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Dark Knight:</span>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/dark-knight-class-guide/" class="lnk">BDFoundry guide</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Striker:</span>
                        <a target="_blank" href="https://www.invenglobal.com/articles/1950/one-point-lessonrecommended-pre-awakening-skillsskill-build-for-strikers" class="lnk">Pre-awakening skill build/guide</a>,
                        <a target="_blank" href="https://www.invenglobal.com/articles/2225/bdo-striker-awakening-guide-pve-combo-hidden-key-commands" class="lnk">awakening skill guide</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <span class="text-muted">Mystic: Coming soon!</span>
                    </div>
                    <p class="text-muted">Note: if you have a better build than one listed above, please
                        <a target="_blank" href="#" class="lnk">contact me</a> and I'll include it!
                    </p>

                    <hr />
                    <h3 class="text-muted">Gear</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://bdoplanner.com/" class="lnk">BDO Planner</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="https://alphaoptix.github.io/bdocrystalz/" class="lnk">BDO Crystalz</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="https://www.reddit.com/r/blackdesertonline/comments/5gzhox/alexmac_gear_enchant_guide_get_those_tets_boys/" class="lnk">Enchanting Guide</a>
                    </div>


                    <hr />
                    <h3 class="text-muted">Leveling</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://www.blackdesertfoundry.com/leveling-1-60-guide/" class="lnk">Leveling 1-60 guide</a>
                    </div>
                </div>

                <div class="table-wrapper" id="links-ghi" style="display:none;">

                    <h3 class="text-muted">General</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://dulfy.net/2016/03/01/black-desert-node-management-and-hiring-workers-basic-guide/" class="lnk">Nodes and Workers Guide (Dulfy)</a>
                    </div>

                    <hr />
                    <h3 class="text-muted">Mounts</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="https://www.blackd.de/horse/" class="lnk">Horse Breeding Calculator</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="https://imgur.com/a/DaeiQ" class="lnk">An amazing horse tier list</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://dulfy.net/2016/08/31/black-desert-miniature-elephant-mount-guide/" class="lnk">Mini Elephant Mount Guide (Dulfy)</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://www.somethinglovely.net/bdo/horses/" class="lnk">Horse Breeding Calculator (Famme)</a>
                    </div>

                    <hr />
                    <h3 class="text-muted">Alchemy</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://dulfy.net/2016/05/08/black-desert-alchemy-life-skill-guide/" class="lnk">Alchemy Guide (Dulfy)</a>
                    </div>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://www.blackdeserttome.com/guides/viewtext?id=11" class="lnk">Alchemy Stone Guide</a>
                    </div>

                    <hr />
                    <h3 class="text-muted">Cooking</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://dulfy.net/2016/06/06/black-desert-cooking-life-skill-guide/" class="lnk">Cooking Guide (Dulfy)</a>
                    </div>

                    <hr />
                    <h3 class="text-muted">Trading</h3>
                    <div class="lnk-row">
                        <i class="fa fa-asterisk text-muted lnk-list" aria-hidden="true"></i>
                        <a target="_blank" href="http://www.somethinglovely.net/bdo/crates/" class="lnk">Trading Crate Calculator (Famme)</a>
                    </div>

                </div>
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

        $('#btn-group-links button').click(function() {
            $(this).addClass('active').siblings().removeClass('active');
        });
        $('#btn-lnk-general').click(function() {
            $('#links-general').css("display", "block");
            $('#links-def').css("display", "none");
            $('#links-ghi').css("display", "none");
        });
        $('#btn-lnk-def').click(function() {
            $('#links-general').css("display", "none");
            $('#links-def').css("display", "block");
            $('#links-ghi').css("display", "none");
        });
        $('#btn-lnk-ghi').click(function() {
            $('#links-general').css("display", "none");
            $('#links-def').css("display", "none");
            $('#links-ghi').css("display", "block");
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
