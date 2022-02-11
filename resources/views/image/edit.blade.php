<h1>Edit image</h1>

<form action="{{ $image->route('update') }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="400">
    </div>
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $image->title) }}">
        @error('title')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Update</button>
</form>