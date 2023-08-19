<div>
    Show Tweets
    <br>
    {{ $content }}
    <br>
    <form method="POST" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content" >
        <button class="btn btn-primary" type="submit">Criar Tweet</button>
        <br>
        @error('content')
            {{$message}}
        @enderror
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        <div class="flex">
            <div class="w-1/8">
                {{$tweet->user->photo}}
                @if ($tweet->user->photo)
                    <img src=" {{url("storage/{$tweet->user->photo}")}}" alt="{{ $tweet->user->name }}" class="rounded-full h-8 w-8">
                @else
                    <img src="https://img.freepik.com/vetores-premium/homem-perfil-caricatura_18591-58482.jpg?w=340" alt="{{ $tweet->user->name }}" class="rounded-full h-8 w-8">
                @endif
                {{ $tweet->user->name }}
            </div>
            <div class="w-8/7">
                - {{ $tweet->content }}
               @if ($tweet->likes->count())
                   <a href="#" wire:click.prevent="unlike({{$tweet->id}})">Descurtir</a>
               @else
                   <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
               @endif
               <br>
            </div>
        </div>
    @endforeach
    <hr>
    {{ $tweets->links() }}
</div>
