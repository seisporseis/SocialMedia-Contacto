<div>
    {{-- funciona como un foreach, pero sin necesitar usar el if. Ya hace la condicion y imprimi todos con el for.  --}}
    {{-- @forelse ($posts as $post)
        <p>{{ $post->titulo }}</p>
    @empty
        <p>No Hay Posts</p>
    @endforelse --}}

    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                </div>
            @endforeach 
        </div>
        
        <div class="my-10">
         
        </div>

    @else
        <p class="text-center">No Hay Posts, sigue a alguien para poder mostrar sus posts</p>
    @endif
</div>