<form method="GET" action="{{ route('users.index')}}" id="user-search-form"
      x-data="formProcessor" @submit.prevent="processFormSubmission" {{ $attributes }}>

    <!-- Antiga Senha -->
    <div class="col-xxl-12">
        <div class="col-12 col-sm-6">
            <x-molecules.form-group
                label="Senha Antiga"
                name="password"
                type="password"
                placeholder="Digite a senha antiga"
                x-bind:class="userForm.hasError('password') ? 'is-invalid' : ''"
                x-model="userForm.data.password"
            >
                <template x-for="error in userForm.getErrorMessages('password')" :key="error">
                    <x-atoms.form-validation><span x-text="error"></span></x-atoms.form-validation>
                </template>
            </x-molecules.form-group>
        </div>
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

    <!-- Botões de Ação -->
    <div class="col-12 d-flex justify-content-end">
        <x-atoms.button type="submit" class="btn btn-primary">
            Salvar
        </x-atoms.button>
    </div>

</form>
