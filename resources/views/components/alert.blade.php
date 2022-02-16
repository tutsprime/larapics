<div {{ $attributes->class(['alert-dismissible fade show' => $dismissible])->merge(['class' => "alert alert-{$validType}", 'role' => $attributes->prepends('alert')]) }}>
    @isset($title)
        <h4 class="alert-heading">{{ $title }}</h4>
    @endisset
    {{ $slot }}
    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>