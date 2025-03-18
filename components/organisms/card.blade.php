<div {{ $attributes->class(['card']) }}>
    {{ $header ?? '' }}
    {{ $slot }}
    {{ $footer ?? '' }}
</div>
