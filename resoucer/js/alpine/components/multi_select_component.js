export default () => ({
    options: [],
    selected: [],
    displayField: 'description',
    search: '',
    isOpen: false,
    maxSelections: null,
    error: '',

    async setOptions(options) {
        if (options instanceof Promise) {
            try {
                const resolvedOptions = await options;
                this.options = resolvedOptions;
            } catch (err) {
                this.error = err.message;
                console.error('Erro ao definir opções:', err);
            }
        } else {
            this.options = options;
        }
    },

    setDisplayField(displayField) {
        this.displayField = displayField;
    },

    toggleDropdown() {
        this.isOpen = !this.isOpen;
    },

    selectOption(option) {
        if (this.maxSelections && this.selected.length >= this.maxSelections) {
            alert(`Você pode selecionar no máximo ${this.maxSelections} itens.`);
            return;
        }

        if (this.selected && !this.selected.find(item => item.id === option.id)) {
            this.selected.push(option);
            this.search = '';
            this.$dispatch('change', {selected: this.selected});
        }
    },

    removeOption(option) {
        this.selected = this.selected.filter(item => item.id !== option.id);
        this.$dispatch('change', {selected: this.selected});
    },

    getFilteredOptions() {
        if (this.search === '') {
            return this.options;
        }
        return this.options.filter(option =>
            option[this.displayField].toLowerCase().includes(this.search.toLowerCase())
        );
    },

    setSelected(selected) {
        this.selected = selected;
    },

    setMaxSelections(maxSelections) {
        this.maxSelections = maxSelections;
    },
});
