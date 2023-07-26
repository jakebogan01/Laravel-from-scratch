<x-layout>
    @foreach($posts as $post)
        {{--access foreach loop variable--}}
        {{--@dd($loop)--}}
        {{--example: class="{{ $loop->even ?: 'foo' }}"--}}
            <article>
                <h1>
                    <a href="/posts/{{ $post->slug }}">
                        {!! $post->title !!}
                    </a>
                </h1>

                <p>
                    <a href="#">{{ $post->category->name }}</a>
                </p>

                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
    @endforeach
</x-layout>

