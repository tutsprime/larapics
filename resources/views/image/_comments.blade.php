<div class="mt-5">
    <x-flash-message />

    @auth
        <x-form action="{{ route('comments.store', $image->slug) }}">
            <div class="d-flex mt-4">
                <div class="flex-shrink-0">
                    <img src="{{ auth()->user()->profileImageUrl() }}" width="64" class="rounded-circle mr-3" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                    <textarea name="body" ... class="form-control mb-1 @error('body') is-invalid @enderror"></textarea>
                    <button type="submit" class="btn btn-primary mt-1">Send</button>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </x-form>
    @else
        <p class="text-muted"><a href="{{ route('login') }}">Sign in</a> to leave a comment</p>
    @endauth

    @foreach ($comments as $comment)
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