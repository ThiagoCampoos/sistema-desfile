<form id="{{ $id }}" method="POST" {{ $attributes }}>
    @csrf
    @method('DELETE')
    {{ $slot }}
</form>
