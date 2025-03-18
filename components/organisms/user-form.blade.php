<style>
    .selected-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .selected-tag {
        display: flex;
        align-items: center;
        background-color: #0d6efd;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
    }

    .selected-tag .remove-tag {
        margin-left: 0.5rem;
        cursor: pointer;
        font-weight: bold;
    }

    .dropdown-menu {
        max-height: 200px;
        overflow-y: auto;
    }
</style>
<form x-data="{ userForm, ...maskFormat(), ...cep(), ...formProcessor(), companyFetch: ajaxComponent() }"
      x-init="
        userForm.setAction('{{ old('action', $action ?? '') }}');
        userForm.setMethod('{{ old('_method', $method ?? 'POST') }}');
        userForm.setData({
            permissions:[],
            name: '<?= old('name')  ?>',
            surname: '<?= old('surname')  ?>',
            cpf: '<?= old('cpf')  ?>',
            email: '<?= old('email')  ?>',
            type: '<?= old('type')  ?>',
            birth_date: '<?= old('birth_date')  ?>',
            phone: '<?= old('phone')  ?>',
            postal_code: '<?= old('postal_code')  ?>',
            address: '<?= old('address') ?>',
            number: '<?= old('number')  ?>',
            complement: '<?= old('complement') ?>',
            neighborhood: '<?= old('neighborhood')  ?>',
            city: '<?= old('city')  ?>',
            state: '<?= old('state')  ?>'
        });
        userForm.setErrors(JSON.parse('{{ json_encode($errors->getBag('form'))}}'));
        companyFetch.setUrl('{{ route('api.clients.index') }}');
        companyFetch.setMethod('GET');
        companyFetch.setHeaders({
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'withCredentials': true
        });
    "
      x-bind:action="userForm.action"
      id="user-form"
      @submit.prevent="processFormSubmission"
      method="POST" {{ $attributes }}>
    @csrf
    <input type="hidden" name="_method" x-bind:value="userForm.method">
    <x-atoms.input type="hidden" name="action" x-bind:value="userForm.action"></x-atoms.input>
    <!-- Empresa -->
    <div class="col-sm-12 mb-3" x-data="multiSelectComponent()"
         x-init="setOptions(companyFetch.fetchData().then(() => {
            return companyFetch.getData();
        })); setDisplayField('name');">
        <x-atoms.label for="clients" text="Selecione as empresas"></x-atoms.label>
        <div class="selected-tags">
            <template x-for="item in selected" :key="item.id">
                <div class="selected-tag">
                    <span x-text="item[displayField]"></span>
                    <span class="remove-tag" @click="removeOption(item)">&times;</span>
                </div>
            </template>
        </div>
        <div class="dropdown">
            <button class="btn btn-outline-primary w-100 text-start" type="button" @click="toggleDropdown"
                    aria-expanded="isOpen">
                <span x-text="search || 'Selecione...'" class="text-muted"></span>
                <span class="float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </span>
            </button>
            <div class="dropdown-menu w-100 p-2" :class="{'show': isOpen}" style="position: absolute;">
                <!-- Campo de busca -->
                <input type="text" class="form-control mb-2" placeholder="Buscar..." x-model="search"
                       @input="isOpen = true">

                <!-- Lista de opções filtradas -->
                <div>
                    <template x-if="getFilteredOptions().length > 0">
                        <ul class="list-group">
                            <template x-for="option in getFilteredOptions()" :key="option.id">
                                <li class="list-group-item list-group-item-action" @click="selectOption(option)"
                                    style="cursor: pointer;">
                                    <span x-text="option[displayField]"></span>
                                    <span class="float-end" x-show="selected.find(item => item.id === option.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                             class="bi bi-check" viewBox="0 0 16 16">
                                            <path
                                                d="M13.485 1.929a.75.75 0 0 1 1.06 1.06l-8 8a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L6 9.439l7.485-7.485z"/>
                                        </svg>
                                    </span>
                                </li>
                            </template>
                        </ul>
                    </template>
                    <template x-if="getFilteredOptions().length === 0">
                        <div class="text-muted text-center">Nenhuma opção encontrada.</div>
                    </template>
                </div>
            </div>
        </div>
        <template x-for="item in selected" :key="item.id">
            <input type="hidden" name="clients[]" :value="item.id" x-bind="userForm.data.clients">
        </template>
    </div>

    <!-- Nome -->
    <div class="col-sm-6">
        <x-molecules.form-group
            label="Nome"
            name="name"
            type="text"
            placeholder="Digite o nome"
            required
            x-bind:class="userForm.hasError('name') ? 'is-invalid' : ''"
            x-model="userForm.data.name"
        >
            <template x-for="error in userForm.getErrorMessages('name')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Sobrenome -->
    <div class="col-sm-6">
        <x-molecules.form-group
            label="Sobrenome"
            name="surname"
            type="text"
            placeholder="Digite o sobrenome"
            x-bind:class="userForm.hasError('surname') ? 'is-invalid' : ''"
            x-model="userForm.data.surname"
        >
            <template x-for="error in userForm.getErrorMessages('surname')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- CPF -->
    <div class="col-sm-5">
        <x-molecules.form-group
            label="CPF"
            name="cpf"
            type="text"
            placeholder="Digite o CPF"
            required
            x-bind:class="userForm.hasError('cpf') ? 'is-invalid' : ''"
            x-mask="999.999.999-99"
            x-model="userForm.data.cpf"
            data-clean="unformat"
            inputmode="numeric"
        >
            <template x-for="error in userForm.getErrorMessages('cpf')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Email -->
    <div class="col-sm-7">
        <x-molecules.form-group
            label="Email"
            name="email"
            type="email"
            placeholder="Digite o email"
            required
            x-bind:class="userForm.hasError('email') ? 'is-invalid' : ''"
            x-model="userForm.data.email"
        >
            <template x-for="error in userForm.getErrorMessages('email')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Senha -->
    <div class="col-sm-6">
        <x-molecules.form-group
            label="Senha"
            name="password"
            type="password"
            placeholder="Digite a senha"
            x-bind:class="userForm.hasError('password') ? 'is-invalid' : ''"
            x-model="userForm.data.password"
        >
            <template x-for="error in userForm.getErrorMessages('password')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Confirmar Senha -->
    <div class="col-sm-6">
        <x-molecules.form-group
            label="Confirmar Senha"
            name="password_confirmation"
            type="password"
            placeholder="Confirme a senha"
            x-bind:class="userForm.hasError('password_confirmation') ? 'is-invalid' : ''"
            x-model="userForm.data.password_confirmation"
        >
            <template x-for="error in userForm.getErrorMessages('password_confirmation')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Tipo de Pessoa -->
    <div class="col-sm-4">
        <x-molecules.form-group
            label="Tipo de Pessoa"
            name="type"
            type="select"
            :options="['administrator' => 'Administrador', 'user' => 'Usuário']"
            placeholder="Selecione o tipo de pessoa"
            required
            x-bind:class="userForm.hasError('type') ? 'is-invalid' : ''"
            x-model="userForm.data.type"
        >
            <template x-for="error in userForm.getErrorMessages('type')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Data de Nascimento -->
    <div class="col-sm-4">
        <x-molecules.form-group
            label="Data de Nascimento"
            name="birth_date"
            type="text"
            placeholder="DD/MM/YYYY"
            x-bind:class="userForm.hasError('birth_date') ? 'is-invalid mask-date' : ''"
            x-mask="99/99/9999"
            x-model="userForm.data.birth_date"
            data-clean="date"
        >
            <template x-for="error in userForm.getErrorMessages('birth_date')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Telefone -->
    <div class="col-sm-4">
        <x-molecules.form-group
            label="Telefone"
            name="phone"
            type="text"
            placeholder="Digite o telefone"
            x-bind:class="userForm.hasError('phone') ? 'is-invalid' : ''"
            @keyup="$el.value = maskPhone($el.value)"
            x-model="userForm.data.phone"
            data-clean="unformat"
            inputmode="tel"
        >
            <template x-for="error in userForm.getErrorMessages('phone')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- CEP -->
    <div class="col-sm-3">
        <x-molecules.form-group
            label="CEP"
            name="postal_code"
            data-id="postal_code"
            type="text"
            placeholder="Digite o CEP"
            x-bind:class="userForm.hasError('postal_code') ? 'is-invalid' : ''"
            x-mask="99999-999"
            x-on:change="fetchCep($el.value)"
            x-model="userForm.data.postal_code"
            data-clean="unformat"
            inputmode="numeric"
        >
            <template x-for="error in userForm.getErrorMessages('postal_code')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
        <div id="loading-indicator" style="display: none;">
            <span>Loading...</span>
        </div>
    </div>

    <!-- Endereço -->
    <div class="col-sm-7">
        <x-molecules.form-group
            label="Endereço"
            name="address"
            data-id="address"
            type="text"
            placeholder="Digite o endereço"
            x-bind:class="userForm.hasError('address') ? 'is-invalid' : ''"
            x-bind:value="fullAddress.address"
            x-model="userForm.data.address"
        >
            <template x-for="error in userForm.getErrorMessages('address')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Número -->
    <div class="col-sm-2">
        <x-molecules.form-group
            label="Número"
            name="number"
            type="text"

            x-bind:class="userForm.hasError('number') ? 'is-invalid' : ''"
            x-model="userForm.data.number"
            inputmode="numeric"
        >
            <template x-for="error in userForm.getErrorMessages('number')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Complemento -->
    <div class="col-sm-12">
        <x-molecules.form-group
            label="Complemento"
            name="complement"
            type="text"
            placeholder="Digite o complemento"
            x-bind:class="userForm.hasError('complement') ? 'is-invalid' : ''"
            x-model="userForm.data.complement"
        >
            <template x-for="error in userForm.getErrorMessages('complement')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Bairro -->
    <div class="col-sm-6">
        <x-molecules.form-group
            label="Bairro"
            name="neighborhood"
            data-id="neighborhood"
            type="text"
            placeholder="Digite o bairro"
            x-bind:class="userForm.hasError('neighborhood') ? 'is-invalid' : ''"
            x-bind:value="fullAddress.neighborhood"
            x-model="userForm.data.neighborhood"
        >
            <template x-for="error in userForm.getErrorMessages('neighborhood')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Cidade -->
    <div class="col-sm-4">
        <x-molecules.form-group
            label="Cidade"
            name="city"
            data-id="city"
            type="text"
            placeholder="Digite a cidade"
            x-bind:class="userForm.hasError('city') ? 'is-invalid' : ''"
            x-bind:value="fullAddress.city"
            x-model="userForm.data.city"
        >
            <template x-for="error in userForm.getErrorMessages('city')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Estado -->
    <div class="col-sm-2">
        <x-molecules.form-group
            label="Estado"
            name="state"
            data-id="state"
            type="select"
            :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MT' => 'MT', 'MS' => 'MS', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'RO' => 'RO', 'RR' => 'RR', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']"
            placeholder="Selecione o estado"
            x-bind:class="userForm.hasError('state') ? 'is-invalid' : ''"
            x-bind:value="fullAddress.state"
            x-model="userForm.data.state"
        >
            <template x-for="error in userForm.getErrorMessages('state')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Permissões -->
    <div>
        <label class="form-label">Permissões</label>
        <div class="row">
            <template x-for="(item, key) in [
            {'key': 'access dashboard', 'value': 'Dashboard'},
            {'key': 'access clients', 'value': 'Clientes'},
            {'key': 'access users', 'value': 'Usuários'},
            {'key': 'access invoices', 'value': 'Faturas'},
            {'key': 'access review', 'value': 'Revisões'}
        ]" :key="key">
                <div class="col-auto">
                    <!-- Switch -->
                    <div class="form-check form-switch">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="permissions[]"
                            :value="item.key"
                            :id="'permission-' + item.key.replace(/ /g, '-')"
                            x-model="userForm.data.permissions"
                            :checked="Array.isArray(userForm.data.permissions) && userForm.data.permissions.includes(item.key)"
                        >
                        <label class="form-check-label" :for="'permission-' + item.key.replace(/ /g, '-')"
                               x-text="item.value"></label>
                    </div>
                </div>
            </template>
        </div>
    </div>


    {{ $slot }}
</form>
