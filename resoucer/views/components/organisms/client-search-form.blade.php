<form method="GET" action="{{ route('clients.index') }}" id="client-search-form"
      x-data="formProcessor" @submit.prevent="processFormSubmission" {{ $attributes }}>
    <!-- Campo Nome -->
    <div class="col-12 col-sm-6 col-md-6 col-xxl-4 search-input-client">
        <x-molecules.form-group
            label="Nome"
            name="name"
            type="text"
            :value="request()->get('name') ?? ''"
            placeholder="Digite o nome"
        />
    </div>

    <!-- Campo Nome Social -->
    <div class="col-12 col-sm-6 col-md-6 col-xxl-4 search-input-client">
        <x-molecules.form-group
            label="Razão Social"
            name="social_reason"
            type="text"
            :value="request()->get('social_reason') ?? ''"
            placeholder="Digite o razão social"
        />
    </div>

    <!-- Campo Nome Fantasia -->
    <div class="col-12 col-sm-6 col-md-4 col-xxl-4 search-input-client">
        <x-molecules.form-group
            label="Nome Fantasia"
            name="fantasy_name"
            type="text"
            :value="request()->get('fantasy_name') ?? ''"
            placeholder="Digite o nome fantasia"
        />
    </div>

    <!-- Campo CPF -->
    <div class=" col-12 col-sm-6 col-md-4 col-xxl-3 search-input-client id-block">
        <x-molecules.form-group
            label="CPF"
            name="cpf"
            type="text"
            :value="request()->get('cpf') ?? ''"
            placeholder="Digite o CPF"
            class="mask-cpf"
            data-clean="unformat"
            x-mask="999.999.999-99"
            inputmode="numeric"
        />
    </div>

    <!-- Campo CNPJ -->
    <div class=" col-12 col-sm-6 col-md-4 col-xxl-3 search-input-client id-block">
        <x-molecules.form-group
            label="CNPJ"
            name="cnpj"
            type="text"
            :value="request()->get('cnpj') ?? ''"
            placeholder="Digite o CNPJ"
            class="mask-cnpj"
            data-clean="unformat"
            x-mask="99.999.999/9999-99"
            inputmode="numeric"
        />
    </div>

    <!-- Botões de Ação -->
    <div class="col-12 col-xxl-6 d-flex align-items-center">
        <div class="ms-auto d-flex gap-2">
            <x-atoms.button type="submit" class="btn-primary">Aplicar Filtros</x-atoms.button>
            <x-atoms.link href="{{ route('clients.index') }}" class="btn btn-secondary">Limpar Filtros</x-atoms.link>
        </div>
    </div>

</form>
