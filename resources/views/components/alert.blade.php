<div {{ $attributes->class(['alert-dismissible fade show' => $dismissible])->merge(['class' => "alert alert-{$validType}", 'role' => $attributes->prepends('alert')]) }}>
    Alert
    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>