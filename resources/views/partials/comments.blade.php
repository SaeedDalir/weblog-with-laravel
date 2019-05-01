<div class="post-comments">
@foreach($comments as $comment)
    <!-- comment -->
        <div class="media">
            <div class="media-left">
                <img class="media-object" src="{{asset('/img/avatar.png')}}" alt="">
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <h4>مهمان</h4>
                    <span class="time">{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($comment->created_at)->formatJalaliDatetime())}}</span>
                    <a class="reply" id="div-comment-{{$comment->id}}">پاسخ</a>
                </div>
                <p>{{$comment->description}}</p>
                <!-- comment -->
                <div class="media">
                    <div class="row form-reply" id="f-div-comment-{{$comment->id}}" style="display: none">
                        <div class="col-md-12" style="margin-bottom: 20px">
                            <div class="form-group">
                                {!! Form::open(['method'=> 'POST' , 'route' => ['frontend.comments.reply']]) !!}
                                {!! Form::hidden('parent_id',$comment->id) !!}
                                {!! Form::hidden('post_id',$post->id) !!}
                                {!! Form::textarea('description',null,['class'=>'input','placeholder'=>'متن نظر خود را وارد کنید ...']) !!}
                            </div>
                            {!! Form::submit('ثبت',['class'=>'primary-button']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @if($comment->status == 1)
                        @include('partials.comments',['comments'=>$comment->replies])
                    @endif
                </div>
                <!-- /comment -->
            </div>
        </div>
        <!-- /comment -->
    @endforeach
</div>