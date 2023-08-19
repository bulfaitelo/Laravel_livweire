<div>
    Show Tweets
    <br>
    {{ $content }}
    <br>
    <form method="POST" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content" >
        <button type="submit">Criar Tweet</button>
        <br>
        @error('content')
            {{$message}}
        @enderror
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        {{ $tweet->user->name }} - {{ $tweet->content }}
        @if ($tweet->likes->count())
            <a href="#" wire:click.prevent="unlike({{$tweet->id}})">Descurtir</a>
        @else
            <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
        @endif
        <br>
    @endforeach
    <hr>
    {{ $tweets->links() }}
</div>
