<form method="GET" action="{{ route('users.index')}}" id="user-search-form"
      x-data="formProcessor" @submit.prevent="processFormSubmission" {{ $attributes }}>
    <!-- Campo Nome -->
    <div class="col-12 col-md-4 col-xxl-4">
        <x-molecules.form-group
            label="Nome"
            name="name"
            type="text"
            :value="request()->get('name') ?? ''"
            placeholder="Digite o nome"
        />
    </div>

    <!-- Campo CPF -->
    <div class="col-12 col-md-4 col-xxl-4">
        <x-molecules.form-group
            label="CPF"
            name="cpf"
            type="text"
            :value="request()->get('cpf') ?? ''"
            placeholder="Digite o CPF"
            data-clean="unformat"
            x-mask="999.999.999-99"
            inputmode="numeric"
        />
    </div>

    <!-- Campo Status -->
    <div class="col-12 col-sm-5 col-md-4 col-xxl-2">
        <x-molecules.form-group
            label="Status"
            name="active"
            type="select"
            :options="['' => 'Todos', 1 => 'Ativo', 0 => 'Inativo']"
            :value="request()->get('active') ?? ''"
        />
    </div>

    <!-- Botões de Ação -->
    <div class="col-12 col-xxl-2 d-flex align-items-center">
        <div class="ms-auto d-flex gap-2">
        <x-atoms.button type="submit" class="btn btn-primary">
            Pesquisar
        </x-atoms.button>
        <x-atoms.link
            href="{{ route('users.index') }}" class="btn btn-secondary"
        >
            Limpar
        </x-atoms.link>
        </div>
    </div>
 
</form>
