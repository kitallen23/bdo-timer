
<!-- Timestamp -->
<div class="col-md-8 col-md-offset-2 scratch-time-wrapper text-muted datetime-wrapper" data-timestamp="{{$time}}" >
    <div class="col-md-10 col-md-offset-1">
        <span class="autosave-text text-muted"><span class="glyphicon glyphicon-ok small-icon"></span>saved</span>
        <span class="datetime pull-right"></span>
    </div>
</div>

<div class="scratch-wrapper col-md-8 col-md-offset-2">

    <!-- Scratch data -->
    <div class="col-md-10 col-md-offset-1 scratch-comment-wrapper" data-focus="false">

        @if($title)
            <div class="col-md-12 scratch-form-inner-wrapper scratch-input-title-wrapper">
                <input type="text" class="form-control scratch-input-title autosave"
                      name="s_title" placeholder="Title" value="{{$title}}" spellcheck="false"/>
            </div>

            <div class="col-md-12 scratch-form-inner-wrapper">
                <textarea class="form-control scratch-input-comment autosave"
                      placeholder="..." rows="3" name="s_comment"  spellcheck="false"
                      data-autoresize>{{$comment}}</textarea>
            </div>
        @else
            <div class="col-md-12 scratch-form-inner-wrapper scratch-input-title-wrapper">
                <input type="text" class="form-control scratch-input-title autosave"
                       name="s_title" placeholder="Title" value="{{$title}}" spellcheck="false"
                       style="display:none;"/>
            </div>

            <div class="col-md-12 scratch-form-inner-wrapper">
                <textarea class="form-control scratch-input-comment autosave"
                      placeholder="..." rows="3" name="s_comment"  spellcheck="false"
                      data-autoresize data-savetime="0" style="border-top:0;">{{$comment}}</textarea>
            </div>
        @endif


    </div>

    <input class="hidden-time" type="hidden" name="timestamp" value="{{ $time }}">

    <div class="col-md-1">
        <!-- Update comment -->
        {{--<div class="form-scratch-updateicon-sm text-center">--}}
            {{--<button type="submit" class="btn-submit btn-submit-blue" name="submit" value="update">--}}
                {{--<span class="glyphicon glyphicon-upload text-valign"></span>--}}
            {{--</button>--}}
        {{--</div>--}}

        <!-- Remove comment -->
        <div class="form-scratch-removeicon-sm text-center">
            <button type="submit" class="btn-submit btn-submit-red" name="submit" value="remove">
                <span class="glyphicon glyphicon-remove text-valign"></span>
            </button>
        </div>
    </div>
</div>
