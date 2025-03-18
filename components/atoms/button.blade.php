<button
    type="{{ $type ?? 'button' }}"
    {{ $attributes->class(['btn']) }}
>
    {{ $slot }}
</button>
