<div>
    {{-- funciona como un foreach, pero sin necesitar usar el if. Ya hace la condicion y imprimi todos con el for.  --}}
    {{-- @forelse ($posts as $post)
        <p>{{ $post->titulo }}</p>
    @empty
        <p>No Hay Posts</p>
    @endforelse --}}

    @if ($posts->count())
    <div class="grid grid-cols-2 grid-flow-row gap-5 p-10">
        @foreach($posts as $post)
        <div class="shadow-xl border border-gray rounded-lg">
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                <div class="bg-light-purple rounded-t-lg p-2">
                  <h5 class="font-normal pl-5">{{ $post->titulo }}</h5>  
                </div>
                <div class="p-5">
                  <pre class="flex justify-start text-sm font-extralight text-gray">{{ $post->descripcion }}</pre>  
                </div>          
                
            </a>
        </div>
        @endforeach
    </div>
        
        


    @else
        <p class="text-center">No Hay Posts, sigue a alguien para poder mostrar sus posts</p>
    @endif
</div>