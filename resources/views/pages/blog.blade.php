@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article class="post">
                        <div class="post-thumb">
                            <a href=""><img src="{{$post->getImage()}}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="{{route('category.show', $post->category->slug)}}"> {{$post->category->title}}</a></h6>

                                <h1 class="entry-title">{{$post->title}}</h1>


                            <div class="entry-content">
                                {{$post->content}}
                            </div>
                            @if($post->tags->pluck('title'))
                            <div class="decoration">
                                @foreach($post->tags as $tag)
                                    <a href="{{route('tag.show', $tag->id)}}" class="btn btn-default">{{$tag->title}}</a>
                                    @endforeach
                            </div>
                            @endif

                            <div class="social-share">
							<span
                                    class="social-share-title pull-left text-capitalize">By {{$post->author->name}}{{$post->created_at}}</span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    @if($post->comments)
                        @foreach($post->comments->where('status', 1) as $comment)
                    <div class="top-comment"><!--top comment-->
                        <img src="{{$comment->user->getImage()}}" class="pull-left img-circle" alt="" width="100" height="100">
                        <h4>{{$comment->user->name}}</h4>
                        <p class="comment-date">{{$comment->created_at->diffForHumans()}}</p>

                        <p>{!! $comment->text !!}</p>
                    </div><!--top comment end-->
                    <!-- end bottom comment-->
                        @endforeach
                    @endif

                        @if(\Illuminate\Support\Facades\Auth::user())
                    <div class="leave-comment"><!--leave comment-->
                        <h4>Leave a reply</h4>


                        {!! Form::open(['route' => 'comment.add']) !!}
                            <div class="form-group">
                                <div class="col-md-12">
										<textarea class="form-control" rows="6" name="text"
                                                  placeholder="Напишите комментарий" required></textarea>
                                    {!! Form::hidden('post_id', $post->id) !!}
                                    {!! Form::hidden('user_id', \Illuminate\Support\Facades\Auth::user()->id) !!}
                                </div>
                            </div>
                        <button>Добавить комментарий</button>
                        {!! Form::close() !!}
                    </div><!--end leave comment-->
                            @endif
                </div>
                @include('pages.sidebar')
            </div>
        </div>
    </div>

    @endsection