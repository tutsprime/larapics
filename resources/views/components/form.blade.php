@props([
    'action',
    'method' => 'POST'
])
<form action="{{ $action }}" method="{{ strtolower($method) === 'get' ? 'GET' : 'POST' }}" {{ $attributes }}>
    @csrf
    @unless (in_array($method, ['GET', 'POST']))
        @method($method)
    @endunless
    {{ $slot }}
</form>