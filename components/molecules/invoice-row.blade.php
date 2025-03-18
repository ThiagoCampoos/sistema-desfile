<tr>
    <x-atoms.table-cell>{{ $invoice->invoice_number }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $invoice->client->name }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $invoice->present('service_amount') }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $invoice->iss_rate }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $invoice->present('iss_tax') }}</x-atoms.table-cell>
    <x-atoms.table-cell>{{ $invoice->present('issue_date') }}</x-atoms.table-cell>
    <x-atoms.table-cell>@if ($invoice->status === 'pending')
            <span class="badge bg-warning">{{ $invoice->present('status') }}</span>
        @elseif ($invoice->status === 'approved')
            <span class="badge bg-success">{{ $invoice->present('status') }}</span>
        @elseif ($invoice->status === 'rejected')
            <span class="badge bg-danger">{{ $invoice->present('status') }}</span>
        @endif</x-atoms.table-cell>
    <x-atoms.table-cell-action>
        <div class="d-flex align-items-center gap-1">
            <x-atoms.link href="{{ route('invoices.pdf', $invoice->id) }}" class="btn btn-label-info
    fas fa-eye" title="Visualizar PDF"/>
            @switch($invoice->status)
                @case('pending')
                    <x-atoms.button
                        type="button"
                        class="btn-label-success fas fa-check"
                        data-bs-toggle="modal"
                        data-bs-target="#modal-confirm-status-invoice-change"
                        @click="statusInvoiceChange.setAction('{{ route('invoices.approve', $invoice->id) }}');
                        statusInvoiceChange.setMethod('POST');"
                        title="Aprovar"
                    />
                    <x-organisms.form>
                        <x-atoms.button
                            type="button"
                            class="btn-label-warning fas fa-times"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-confirm-status-invoice-change"
                            @click="statusInvoiceChange.setAction('{{ route('invoices.reject', $invoice->id) }}');
        statusInvoiceChange.setMethod('POST');"
                            title="Rejeitar"
                        />
                    </x-organisms.form>
                    <x-organisms.form>
                        <x-atoms.button
                            type="button"
                            class="btn-label-danger fas fa-trash-alt"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-confirm-delete-invoice"
                            @click="deleteInvoice.setAction('{{ route('invoices.destroy', $invoice->id) }}');
        statusInvoiceChange.setMethod('POST');"
                            title="Deletar"
                        />
                    </x-organisms.form>
                    @break

                @case('approved')
                    <x-organisms.form>
                        <x-atoms.button
                            type="button"
                            class="btn-label-warning fas fa-times"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-confirm-status-invoice-change"
                            @click="statusInvoiceChange.setAction('{{ route('invoices.reject', $invoice->id) }}');
        statusInvoiceChange.setMethod('POST');"
                            title="Rejeitar"
                        />
                    </x-organisms.form>
                    @break

                @case('rejected')
                    <x-organisms.form>
                        <x-atoms.button
                            type="button"
                            class="btn-label-success fas fa-check"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-confirm-status-invoice-change"
                            @click="statusInvoiceChange.setAction('{{ route('invoices.approve', $invoice->id) }}');
        statusInvoiceChange.setMethod('POST');"
                            title="Aprovar"
                        />
                    </x-organisms.form>
                    <x-organisms.form>
                        <x-atoms.button
                            type="button"
                            class="btn-label-danger fas fa-trash-alt"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-confirm-delete-invoice"
                            @click="deleteInvoice.setAction('{{ route('invoices.destroy', $invoice->id) }}');
        statusInvoiceChange.setMethod('POST');"
                            title="Deletar"
                        />
                    </x-organisms.form>
                    @break
            @endswitch
        </div>
    </x-atoms.table-cell-action>
</tr>
