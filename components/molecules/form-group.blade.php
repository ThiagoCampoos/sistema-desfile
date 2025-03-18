<div class="mb-3">
    @if ($type === 'checkbox')
        <div class="form-check">
            <x-atoms.checkbox
                :name="$name"

                :checked="$checked"
                {{ $attributes }}
            />
            <x-atoms.label
                for="{{ $name }}"
                :text="$label"
                class="form-label"
            />
            {{ $slot }}
        </div>
    @elseif ($type === 'select')
        <x-atoms.label for="{{ $name }}" :text="$label" class="form-label"/>
        <x-atoms.select
            :name="$name"
            :options="$options ?? []"
            {{ $attributes }}
        />
        {{ $slot }}
    @elseif ($type === 'file')
        <x-atoms.label for="{{ $for ?? $name }}" :text="$label" class="form-label"/>
        <x-atoms.input
            type="file"
            name="{{ $name }}"
            {{ $attributes }}
        />
        {{ $slot }}
    @else
        <x-atoms.label for="{{ $name }}" :text="$label" class="form-label"/>
        <x-atoms.input
            type="{{ $type }}"
            name="{{ $name }}"

            {{ $attributes }}
        />
        {{ $slot }}
    @endif
</div>
