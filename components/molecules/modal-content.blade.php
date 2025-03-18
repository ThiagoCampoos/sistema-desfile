@if(isset($title) && $title)
    <div class="modal-header">
        <h5 class="modal-title">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
    </div>
@endif
<div class="modal-body">
    {{ $slot }}
</div>
<div class="modal-footer">
    {{ $footer ?? '' }}
</div>
