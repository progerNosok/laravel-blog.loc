<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <aside class="widget news-letter">
            <h3 class="widget-title text-uppercase text-center">Уведомлять о выходе новых статей</h3>
                @include('admin.errors')
            {!! Form::open(['route' => 'subscribe']) !!}
                <input type="email" placeholder="Ваш email адресс" name="email">
                <input type="submit" value="Подписаться"
                       class="text-uppercase text-center btn btn-subscribe">
            {!! Form::close() !!}

        </aside>
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Популярные статьи</h3>
`
            @foreach($popularPosts as $post)
            <div class="popular-post">


                <a href="{{route('post.show', $post->slug)}}" class="popular-img"><img src="{{$post->getImage()}}" alt="">

                    <div class="p-overlay"></div>
                </a>

                <div class="p-content">
                    <a href="{{route('post.show', $post->slug)}}" class="text-uppercase">{{$post->title}}</a>
                    <span class="p-date">{{$post->created_at}}</span>

                </div>
            </div>
                @endforeach

        </aside>
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Рекомендованные статьи</h3>
            @foreach($featuredPosts as $post)
            <div id="widget-feature" class="owl-carousel">
                <div class="item">
                    <div class="feature-content">
                        <img src="{{$post->getImage()}}" alt="">

                        <a href="{{route('post.show', $post->slug)}}" class="overlay-text text-center">
                            <h5 class="text-uppercase">{{$post->title}}</h5>

                            <p>{!! $post->description !!}</p>
                        </a>
                    </div>
                </div>
            </div>
                @endforeach
        </aside>
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Недавние статьи</h3>

            <div class="thumb-latest-posts">

                @foreach($recentPosts as $post)
                <div class="media">
                    <div class="media-left">
                        <a href="{{route('post.show', $post->slug)}}" class="popular-img"><img src="{{$post->getImage()}}" alt="">
                            <div class="p-overlay"></div>
                        </a>
                    </div>
                    <div class="p-content">
                        <a href="#" class="text-uppercase">{{$post->title}}</a>
                        <span class="p-date">{{$post->created_at}}</span>
                    </div>
                </div>
            </div>
            <div class="thumb-latest-posts">
                @endforeach
            </div>
        </aside>
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Категории</h3>
            <ul>
                @foreach($categories as $category)
                <li>
                    <a href="{{route('category.show', $post->slug)}}">{{$category->title}}s</a>
                    <span class="post-count pull-right"> ({{$category->posts->count()}})</span>
                </li>
                    @endforeach

            </ul>
        </aside>
    </div>
</div>
</div>