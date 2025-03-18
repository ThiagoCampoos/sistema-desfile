<tr>
    <x-atoms.table-cell>{{ $user->name }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $user->present('cpf') }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $user->email }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $user->present('phone') }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $user->present('active') }}</x-atoms.table-cell>
    <x-atoms.table-cell-action>
        <div class="d-flex align-items-center gap-1">
            <x-atoms.button
                type="button"
                class="btn-label-primary fas fa-edit"
                data-bs-toggle="modal"
                data-bs-target="#modal-user"
                @click="userForm.setAction('{{ route('users.update', ['user' => $user->id]) }}'); userForm.setMethod('PUT');
            userForm.setData({
                name: '{{ $user->name }}',
                surname: '{{ $user->surname }}',
                email: '{{ $user->email }}',
                cpf: '{{ $user->present('cpf') }}',
                phone: '{{ $user->present('phone') }}',
                type:'{{ $user->type }}',
                birth_date:'{{ $user->present('birth_date') }}',
                postal_code:' {{ $user->present('postal_code') }}',
                address: '{{ $user->address }}',
                number: '{{ $user->number }}',
                complement:'{{ $user->complement }}',
                neighborhood: '{{ $user->neighborhood }}',
                city: '{{ $user->city }}',
                state: '{{ $user->state }}',
                permissions: JSON.parse('{{ json_encode($user->getAllPermissions()->pluck('name')) }}')
            })"
            />
            @if($user->active)
                <x-atoms.button
                    type="button"
                    class="btn-label-warning fas fa-user-alt-slash"
                    data-bs-toggle="modal"
                    data-bs-target="#confirm-deactivate-modal"
                    @click="statusUserForm.setAction('{{ route('users.deactivate', ['user' => $user->id ]) }}'); userName =
                '{{ $user->name }}'"
                />
            @else
                <x-atoms.button
                    type="button"
                    class="btn-label-success fas fa-user-plus"
                    data-bs-toggle="modal"
                    data-bs-target="#confirm-activate-modal"
                    @click="statusUserForm.setAction('{{ route('users.activate', ['user' => $user->id ]) }}'); userName =
                '{{ $user->name }}'"
                />
            @endif
            <x-atoms.button
                type="button"
                class="btn-label-danger fas fa-trash-alt"
                data-bs-toggle="modal"
                data-bs-target="#confirm-delete-modal"
                @click="deleteUserForm.setAction('{{ route('users.destroy', ['user' => $user->id ]) }}');
                deleteUserForm.setMethod('DELETE'); userName = '{{ $user->name }}'"
            />
        </div>
    </x-atoms.table-cell-action>
</tr>
