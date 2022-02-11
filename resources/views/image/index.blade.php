<h1>All images</h1>

<a href="{{ route('images.create') }}">Upload Image</a>

@foreach ($images as $image)
    <div>
        <a href="{{ $image->permalink() }}">
            <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="300">
        </a>
    </div>
@endforeach