<div class="mt-5">
    <x-flash-message />
    <x-form action="{{ route('comments.store', $image->slug) }}">
        <div class="d-flex mt-4">
            <div class="flex-shrink-0">
                <img src="{{ auth()->user()->profileImageUrl() }}" width="64" class="rounded-circle mr-3" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <textarea rows="3" name="body" placeholder="Write comment here" class="form-control mb-1 @error('body') is-invalid @enderror"></textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary mt-1">Send</button>
            </div>
        </div>
    </x-form>
    @foreach ($image->comments as $comment)
        <div class="d-flex mt-4">
            <div class="flex-shrink-0">
                <img src="{{ $comment->user->profileImageUrl() }}" width="64" class="rounded-circle mr-3" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5 class="">{{ $comment->user->username }} <small class="text-muted pl-2">{{ $comment->created_at->diffForHumans() }}</small></h5>
                <div>
                    {{ $comment->body }}
                </div>
            </div>
        </div>
    @endforeach
</div>