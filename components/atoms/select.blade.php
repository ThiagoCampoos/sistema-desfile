<select
    name="{{ $name }}"
    {{ $attributes->except(['placeholder', 'options'])->merge(['class' => 'form-control' ]) }}
>
    @if (!empty($placeholder))
        <option disabled>
            {{ $placeholder }}
        </option>
    @endif
    @foreach ($options as $key => $label)
        <option value="{!! $key !!}">
            {{ $label }}
        </option>
    @endforeach
</select>
