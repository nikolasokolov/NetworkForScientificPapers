<div class="row" style="background-color: white; margin: 0;">
    <div class="panel panel-default" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-comments" aria-hidden="true"></i> <b>Recent Comments</b>
            </h3>
        </div>
        @foreach($comments as $comment)
            <div class="panel-body">
                <ul class="media-list">
                    <li class="media">
                        <div class="media-left">
                            <img src="{{asset('images/user.png')}}"/>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <b>{{$comment->user->name}}</b>
                                <br>
                                <small>commented on {{$comment->created_at}}</small>
                            </h4>
                            <p><b>{{$comment->body}}</b></p>
                        </div>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
</div>