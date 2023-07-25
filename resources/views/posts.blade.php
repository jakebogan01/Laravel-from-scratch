<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My Blog</title>
        <link rel="stylesheet" href="/app.css">
    </head>
    <body>
        @foreach ($posts as $post)
        {{--access foreach loop variable--}}
        {{--@dd($loop)--}}
        {{--example: class="{{ $loop->even ?: 'foo' }}"--}}
            <article>
                <h1>
                    <a href="/posts/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h1>

                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
        @endforeach
    </body>
</html>
