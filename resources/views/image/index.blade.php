<x-layout title="Discover free images">
    <h1>All images</h1>
    
    <a href="{{ route('images.create') }}">Upload Image</a>
    
    @if ($message = session('message'))
        <div>{{ $message }}</div>
    @endif
    
    @foreach ($images as $image)
        <div>
            <a href="{{ $image->permalink() }}">
                <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="300">
            </a>
            <div>
                <a href="{{ $image->route('edit') }}">Edit</a> |
                <x-form action="{{ $image->route('destroy') }}" method="DELETE" style="display: inline">
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </x-form>
            </div>
        </div>
    @endforeach
</x-layout>