<table  class="table table-hover nowrap w-100">
    @foreach ($headers as $header)
        <x-atoms.table-header>{{ $header }}</x-atoms.table-header>
    @endforeach
    <tbody>
    {{ $slot }}
    </tbody>
</table>
