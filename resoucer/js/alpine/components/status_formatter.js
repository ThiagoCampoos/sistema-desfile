export default () => ({
    toEnglish(status) {
        if( status === 'pendente' ){
            return "pending"
        } if ( status === 'aprovado') {
            return "approved"
        } else {
            return "rejected"
        }
    },

    toPortuguese(status) {
        if( status === 'pending' ){
            return "Pendente"
        } if ( status === 'approved') {
            return "Aprovado"
        } else {
            return "Rejeitado"
        }
    },
});