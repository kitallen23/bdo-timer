
<!-- Time -->
<div class="col-md-8 col-md-offset-2 scratch-time-wrapper text-muted datetime-wrapper" data-timestamp="{{$time}}" >
    <div class="col-md-10 col-md-offset-1">
        <span class="datetime pull-right"></span>
    </div>
</div>

<div class="scratch-wrapper col-md-8 col-md-offset-2">

    <!-- Scratch data -->
    <div class="col-md-10 col-md-offset-1 scratch-comment-wrapper">

        @if($title)
            <div class="col-md-12 scratch-form-inner-wrapper">
                <input type="text" class="form-control scratch-input-title"
                      name="s_title" placeholder="Title" value="{{$title}}" spellcheck="false"/>
            </div>
        @else
            <input type="hidden" name="s_title" value="" />
        @endif
        <div class="col-md-12 scratch-form-inner-wrapper">
            <textarea class="form-control scratch-input-comment"
                  placeholder="..." rows="3" name="s_comment"  spellcheck="false"
                  data-autoresize required >{{$comment}}</textarea>
        </div>

    </div>

    <input type="hidden" name="time" value="{{ $time }}">

    <div class="col-md-1">
        <!-- Update comment -->
        <div class="form-scratch-updateicon-sm text-center">
            <button type="submit" class="btn-submit btn-submit-blue" name="submit" value="update">
                <span class="glyphicon glyphicon-upload text-valign"></span>
            </button>
        </div>

        <!-- Remove comment -->
        <div class="form-scratch-removeicon-sm text-center">
            <button type="submit" class="btn-submit btn-submit-red" name="submit" value="remove">
                <span class="glyphicon glyphicon-remove text-valign"></span>
            </button>
        </div>
    </div>
</div>

<script>
    {{--$(document).ready(function() {--}}
        {{--var date = new Date('{{$time}}' * 1000);--}}
        {{----}}
    {{--});--}}
</script>
