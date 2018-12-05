<h1>На сайте laravel-blog.loc Вышел новый пост. {{$post->title}}</h1>
<a href="{!! route('post.show', $post->slug) !!}">Кликните чтобы увидеть новый пост</a>