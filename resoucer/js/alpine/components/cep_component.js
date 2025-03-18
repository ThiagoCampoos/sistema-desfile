export default () => ({
    fullAddress: {
        address: '',
        neighborhood: '',
        city: '',
        state: '',
    },

    async fetchCep(cep) {
        try {
            cep = cep.replace(/\D/g, '');
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (data.error) this.fullAddress = {
                address: 'CEP not found!',
                neighborhood: '',
                city: '',
                state: '',
            };

            this.fullAddress = {
                address: data.logradouro,
                neighborhood: data.bairro,
                city: data.localidade,
                state: data.uf
            };
        } catch (error) {
            this.fullAddress = {
                address: 'Error',
                neighborhood: '',
                city: '',
                state: '',
            };
        }
    }
});
