<tr>
    <x-atoms.table-cell>{{ $client->name }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $client->social_reason }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $client->present('cpf') }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $client->present('cnpj') }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $client->email }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $client->present('phone') }}</x-atoms.table-cell>
    <x-atoms.table-cell-action>
        <div class="d-flex align-items-center gap-1">
            <x-atoms.button
                type="button"
                class="btn-label-primary fas fa-edit"
                data-bs-toggle="modal"
                data-bs-target="#modal-client"
                @click="
                    clientForm.setAction('{{ route('clients.update', ['client' => $client->id ]) }}');
                    clientForm.setMethod('PUT');
                    clientForm.setData({
                        name: '{{ $client->name }}',
                        social_reason: '{{ $client->social_reason }}',
                        fantasy_name: '{{ $client->fantasy_name }}',
                        email: '{{ $client->email }}',
                        cpf: '{{ $client->present('cpf') }}',
                        cnpj: '{{ $client->present('cnpj') }}',
                        phone: '{{ $client->present('phone') }}',
                        zip_code: '{{ $client->present('zip_code') }}',
                        address: '{{ $client->address }}',
                        number: '{{ $client->number }}',
                        complement: '{{ $client->complement }}',
                        neighborhood: '{{ $client->neighborhood }}',
                        city: '{{ $client->city }}',
                        state: '{{ $client->state }}'
                    })
                "
            />
            <x-atoms.button
                type="button"
                class="btn-label-danger fas fa-trash-alt"
                data-bs-toggle="modal"
                data-bs-target="#confirm-delete-modal"
                @click="deleteClientForm.setAction('{{ route('clients.destroy', ['client' => $client->id ]) }}');
                deleteClientForm.setMethod('DELETE'); clientName = '{{ $client->name }}'"
            />
            <x-atoms.button
                type="button"
                class="btn-primary fas fa-eye"
                @click="toggleRow({{ $client->id }})"
            />
        </div>
    </x-atoms.table-cell-action>
</tr>
