<x-layout>
    @foreach($posts as $post)
        {{--access foreach loop variable--}}
        {{--@dd($loop)--}}
        {{--example: class="{{ $loop->even ?: 'foo' }}"--}}
            <article>
                <h1>
                    <a href="/posts/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </h1>

                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
    @endforeach
</x-layout>

