<div>
    <h1>Upload de foto</h1>
    <form action="#" action="post" wire:submit.prevent="storagePhoto">
        <input type="file" wire:model="photo">
        @error('photo')
            {{ $message }}
        @enderror
        <br>
        <button type="submit">Upload Photo</button>
    </form>
</div>
