import dateFormatter from './date_formatter';
import valueConverter from './value_converter';

export default () => ({
    ...dateFormatter(),
    ...valueConverter(),

    sanitizeInputs() {
        const inputs = this.$root.querySelectorAll('[data-clean="unformat"]');
        inputs.forEach((input) => {
            input.value = input.value.replace(/\D/g, '');
        });
    },

    processNumericInputs() {
        const inputs = this.$root.querySelectorAll('[data-clean="currency"]');
        inputs.forEach((input) => {
            input.value = this.toUSCurrencyFormat(input.value);
        });
    },

    processDateInputs() {
        const dateInputs = this.$root.querySelectorAll('[data-clean="date"]');
        dateInputs.forEach((input) => {
            input.value = this.toUSDateFormat(input.value);
        });
    },

    processFormSubmission() {
        this.sanitizeInputs();
        this.processNumericInputs();
        this.processDateInputs();
        this.$el.submit();
    },
});
