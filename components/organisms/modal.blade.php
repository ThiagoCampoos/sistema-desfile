<div class="modal fade" tabindex="-1" id="{{ $id }}" {{ $attributes }}>
    <div class="modal-dialog modal-dialog-centered  {{ $size ?? '' }}">
        <div class="modal-content">
            <x-molecules.modal-header title="{{ $title }}"/>

            <div class="modal-body">
                {{ $slot }}
            </div>

            @if (isset($footer))
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
