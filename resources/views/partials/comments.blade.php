<div class="post-comments">
@foreach($comments as $comment)
    @if($comment->status == 1)
        <!-- comment -->
        <div class="media">
            <div class="media-left">
                <img class="media-object" src="{{asset('/img/avatar.png')}}" alt="">
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <h4>{{$comment->name}}</h4>
                    <span class="time">{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($comment->created_at)->formatJalaliDatetime())}}</span>
                    <a class="reply" id="div-comment-{{$comment->id}}">پاسخ</a>
                </div>
                <p>{{$comment->description}}</p>
                <!-- comment -->
                <div class="media">
                    <div class="row form-reply" id="f-div-comment-{{$comment->id}}" style="display: none;margin-bottom: 10px">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::open(['method'=> 'POST' , 'route' => ['frontend.comments.reply']]) !!}
                                {!! Form::hidden('parent_id',$comment->id) !!}
                                {!! Form::hidden('post_id',$post->id) !!}

                                {!! Form::label('email','نام:') !!}
                                {!! Form::text('name',null,['class'=>'input','placeholder'=>'نام خود را وارد کنید ... *']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('email','ایمیل:') !!}
                                {!! Form::text('email',null,['class'=>'input','placeholder'=>'ایمیل خود را وارد کنید ... *']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('description','متن پیام:') !!}
                                {!! Form::textarea('description',null,['class'=>'input','placeholder'=>'متن نظر خود را وارد کنید ... *']) !!}
                            </div>
                            {!! Form::submit('ثبت',['class'=>'primary-button']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                        @include('partials.comments',['comments'=>$comment->replies])
                </div>
                <!-- /comment -->
            </div>
        </div>
        <!-- /comment -->
        @endif

    @endforeach
</div>