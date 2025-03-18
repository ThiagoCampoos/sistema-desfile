export default () => ({
    action: '',
    method: 'POST',
    data: {},
    errors: {},

    setAction(action) {
        this.action = action;
    },

    setMethod(method) {
        this.method = method;
    },

    setData(data) {
        this.data = {...this.data, ...data};
    },

    setErrors(errors) {
        this.errors = errors;
    },

    resetForm() {
        this.action = '';
        this.method = 'POST';
        this.errors = {};

        for (let key in this.data) {
            if (Array.isArray(this.data[key])) {
                this.data[key] = [];
            } else if (typeof this.data[key] === 'object' && this.data[key] !== null) {
                this.data[key] = {};
            } else {
                this.data[key] = '';
            }
        }
    },

    hasError(field) {
        return this.errors[field]?.length > 0;
    },

    getErrorMessages(field) {
        return this.errors[field] || [];
    },
});
