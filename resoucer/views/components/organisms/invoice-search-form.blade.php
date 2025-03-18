<form method="GET" id="invoice-filter-form" action="{{ route('invoices.index') }}" {{ $attributes }}>
    <div class="col-12 col-sm-6 col-md-6 col-xxl-4">
        <x-molecules.form-group
            label="Cliente"
            name="client_name"
            type="text"
            value="{{ request('client_name') }}"/>
    </div>

    <div class="col-12 col-sm-6 col-md-6 col-xxl-4">
        <x-molecules.form-group
            label="Tomador (CNPJ)"
            name="recipment_document"
            type="text"
            id="invoice-filter-form-issuer-cnpj"
            placeholder="CNPJ do Tomador"
            value="{{ request('issuer_document') }}"
            class="mask-cnpj"
            inputmode="numeric"
        />
    </div>

    <div class="col-12 col-sm-4 col-md-4 col-xxl-4">
        <x-molecules.form-group
            label="Competência"
            name="competence"
            type="month"
            value="{{ request('competence') }}"/>
    </div>

    <div class="col-12 col-sm-4 col-md-4 col-xxl-4">
        <x-molecules.form-group
            label="Emissão - Início"
            name="issue_start"
            type="date"
            value="{{ request('issue_start') }}"/>
    </div>

    <div class="col-12 col-sm-4 col-md-4 col-xxl-4">
        <x-molecules.form-group
            label="Emissão - Fim"
            name="issue_end"
            type="date"
            value="{{ request('issue_end') }}"/>
    </div>

    <div class="col-12 col-xxl-4 d-flex align-items-center">
        <div class="ms-auto d-flex gap-2">
            <x-atoms.button type="submit" class="btn-primary">Aplicar Filtros</x-atoms.button>
            <x-atoms.link href="{{ route('invoices.index') }}" class="btn btn-secondary">Limpar Filtros</x-atoms.link>
        </div>
    </div>
</form>
