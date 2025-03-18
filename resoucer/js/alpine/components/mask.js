export default () => ({ 
    maskPhone(value) {
        
        let cleaned = value.replace(/\D/g, '');
        
        if (cleaned.length >= 14) {
            return cleaned.substring(0, 14);
        }

        if (cleaned.length <= 8) {
            return cleaned.replace(/(\d{4})(\d{1,4})$/, '$1-$2');
        } else if (cleaned.length <= 9) {
            return cleaned.replace(/(\d{1})(\d{4})(\d{1,4})$/, '$1 $2-$3');
        } else if (cleaned.length <= 10) {
            return cleaned.replace(/(\d{2})(\d{4})(\d{1,4})$/, '($1) $2-$3');
        } else if (cleaned.length <= 11) {
            return cleaned.replace(/(\d{2})(\d{1})(\d{4})(\d{1,4})$/, '($1) $2 $3-$4');
        } else if (cleaned.length <= 12) {
            return cleaned.replace(/(\d{2})(\d{2})(\d{4})(\d{1,4})$/, '+$1 ($2) $3-$4');
        } else if (cleaned.length <= 13) {
            return cleaned.replace(/(\d{2})(\d{2})(\d{1})(\d{4})(\d{1,4})$/, '+$1 ($2) $3 $4-$5');
        } 
    }
})