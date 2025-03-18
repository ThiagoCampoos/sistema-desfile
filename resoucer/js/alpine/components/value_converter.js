export default () => ({
    toUSCurrencyFormat(numberString) {
        return parseFloat(
            numberString.replace(/\./g, '').replace(',', '.')
        ).toFixed(2);
    },

    toBRLCurrencyFormat(numberString) {
        return parseFloat(
            numberString.replace(/\./g, '').replace(',', '.')
        ).toFixed(2).replace('.', ',');
    },
});
