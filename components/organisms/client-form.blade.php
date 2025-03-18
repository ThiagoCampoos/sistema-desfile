<form
    x-data="{ clientForm, ...maskFormat(), ...cep(), ...formProcessor() }"
    x-init="
        clientForm.setAction('{{ old('action', $action ?? '') }}');
        clientForm.setMethod('{{ old('_method', $method ?? 'POST') }}');
        clientForm.setData({
            name: '{{ old('name') }}',
            social_reason: '{{ old('social_reason') }}',
            fantasy_name: '{{ old('fantasy_name') }}',
            cnpj: '{{ old('cnpj') }}',
            cpf: '{{ old('cpf') }}',
            email: '{{ old('email') }}',
            phone: '{{ old('phone') }}',
            zip_code: '{{ old('zip_code') }}',
            address: '{{ old('address') }}',
            number: '{{ old('number') }}',
            complement: '{{ old('complement') }}',
            neighborhood: '{{ old('neighborhood') }}',
            city: '{{ old('city') }}',
            state: '{{ old('state') }}',
        });
        clientForm.setErrors(JSON.parse('{{ json_encode($errors->getBag('form'))}}'));
    "
    x-bind:action="clientForm.action"
    method="POST"
    id="client-form"
    @submit.prevent="processFormSubmission"
    {{ $attributes }}
>
    @csrf
    <input type="hidden" name="_method" x-bind:value="clientForm.method">
    <x-atoms.input type="hidden" name="action" x-bind:value="clientForm.action"></x-atoms.input>
    <!-- Nome -->
    <div class="col-md-6">
        <x-molecules.form-group
            label="Nome"
            name="name"
            type="text"
            placeholder="Digite o nome"
            required
            x-bind:class="clientForm.hasError('name') ? 'is-invalid' : ''"
            x-model="clientForm.data.name"
        >
            <template x-for="error in clientForm.getErrorMessages('name')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Razão Social -->
    <div class="col-md-6">
        <x-molecules.form-group
            label="Razão Social"
            name="social_reason"
            type="text"
            placeholder="Digite a razão social"
            x-bind:class="clientForm.hasError('social_reason') ? 'is-invalid' : ''"
            x-model="clientForm.data.social_reason"
        >
            <template x-for="error in clientForm.getErrorMessages('social_reason')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Nome Fantasia -->
    <div class="col-md-6">
        <x-molecules.form-group
            label="Nome Fantasia"
            name="fantasy_name"
            type="text"
            placeholder="Digite o nome fantasia"
            x-bind:class="clientForm.hasError('fantasy_name') ? 'is-invalid' : ''"
            x-model="clientForm.data.fantasy_name"
        >
            <template x-for="error in clientForm.getErrorMessages('fantasy_name')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- CNPJ -->
    <div class="col-md-6">
        <x-molecules.form-group
            label="CNPJ"
            name="cnpj"
            type="text"
            placeholder="Digite o CNPJ"
            x-bind:class="clientForm.hasError('cnpj') ? 'is-invalid' : ''"
            x-mask="99.999.999/9999-99"
            x-model="clientForm.data.cnpj"
            data-clean="unformat"
            inputmode="numeric"
        >
            <template x-for="error in clientForm.getErrorMessages('cnpj')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- CPF -->
    <div class="col-md-6">
        <x-molecules.form-group
            label="CPF"
            name="cpf"
            type="text"
            placeholder="Digite o CPF"
            x-bind:class="clientForm.hasError('cpf') ? 'is-invalid' : ''"
            x-mask="999.999.999-99"
            x-model="clientForm.data.cpf"
            data-clean="unformat"
            inputmode="numeric"
        >
            <template
                x-for="error in clientForm.getErrorMessages('cpf')">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>


    <!-- Email -->
    <div class="col-md-6">
        <x-molecules.form-group
            label="Email"
            name="email"
            type="email"
            placeholder="Digite o email"
            x-bind:class="clientForm.hasError('email') ? 'is-invalid' : ''"
            x-model="clientForm.data.email"
        >
            <template x-for="error in clientForm.getErrorMessages('email')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Telefone -->
    <div class="col-md-6">
        <x-molecules.form-group
            label="Telefone"
            name="phone"
            type="text"
            placeholder="Digite o telefone"
            x-bind:class="clientForm.hasError('phone') ? 'is-invalid' : ''"
            @keyup="$el.value = maskPhone($el.value)"
            x-model="clientForm.data.phone"
            data-clean="unformat"
            inputmode="tel"
        >
            <template x-for="error in clientForm.getErrorMessages('phone')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- CEP -->
    <div class="col-md-6">
        <x-molecules.form-group
            label="CEP"
            name="zip_code"
            data-id="zip_code"
            type="text"
            placeholder="Digite o CEP"
            x-bind:class="clientForm.hasError('zip_code') ? 'is-invalid' : ''"
            x-mask="99999-999"
            x-on:change="fetchCep($el.value)"
            x-model="clientForm.data.zip_code"
            data-clean="unformat"
            inputmode="numeric"
        >
            <template x-for="error in clientForm.getErrorMessages('zip_code')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
        <div id="loading-indicator" style="display: none;">
            <span>Loading...</span>
        </div>
    </div>

    <!-- Endereço -->
    <div class="col-md-6">
        <x-molecules.form-group
            label="Endereço"
            name="address"
            type="text"
            placeholder="Digite o endereço"
            x-bind:class="clientForm.hasError('address') ? 'is-invalid' : ''"
            x-bind:value="fullAddress.address"
            x-model="clientForm.data.address"
        >
            <template x-for="error in clientForm.getErrorMessages('address')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Número -->
    <div class="col-md-3">
        <x-molecules.form-group
            label="Número"
            name="number"
            type="text"
            placeholder="Digite o número"
            x-bind:class="clientForm.hasError('number') ? 'is-invalid' : ''"
            x-model="clientForm.data.number"
            inputmode="numeric"
        >
            <template x-for="error in clientForm.getErrorMessages('number')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Complemento -->
    <div class="col-md-3">
        <x-molecules.form-group
            label="Complemento"
            name="complement"
            type="text"
            
            x-bind:class="clientForm.hasError('complement') ? 'is-invalid' : ''"
            x-model="clientForm.data.complement"
        >
            <template x-for="error in clientForm.getErrorMessages('complement')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Bairro -->
    <div class="col-md-4">
        <x-molecules.form-group
            label="Bairro"
            name="neighborhood"
            type="text"
            placeholder="Digite o bairro"
            x-bind:class="clientForm.hasError('neighborhood') ? 'is-invalid' : ''"
            x-bind:value="fullAddress.neighborhood"
            x-model="clientForm.data.neighborhood"
        >
            <template x-for="error in clientForm.getErrorMessages('neighborhood')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Cidade -->
    <div class="col-md-4">
        <x-molecules.form-group
            label="Cidade"
            name="city"
            type="text"
            placeholder="Digite a cidade"
            class="clientForm.hasError('city') ? 'is-invalid' : ''"
            x-bind:value="fullAddress.city"
            x-model="clientForm.data.city"
        >
            <template x-for="error in clientForm.getErrorMessages('city')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>

    <!-- Estado -->
    <div class="col-md-4">
        <x-molecules.form-group
            label="Estado"
            name="state"
            type="select"
            :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MT' => 'MT', 'MS' => 'MS', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'RO' => 'RO', 'RR' => 'RR', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']"
            placeholder="Selecione o estado"
            x-bind:class="clientForm.hasError('state') ? 'is-invalid' : ''"
            x-bind:value="fullAddress.state"
            x-model="clientForm.data.state"
        >
            <template x-for="error in clientForm.getErrorMessages('state')" :key="error">
                <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
            </template>
        </x-molecules.form-group>
    </div>
    {{ $slot }}
</form>
