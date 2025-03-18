<tr class="{{ $class ?? '' }}">
    @foreach ($data as $cell)
        <x-atoms.table-cell>{{ $cell }}</x-atoms.table-cell>
    @endforeach
    {{ $slot }}
</tr>
