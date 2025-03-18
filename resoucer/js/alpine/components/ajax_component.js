export default () => ({
    url: '',
    method: 'GET',
    payload: null,
    headers: {},
    data: [],
    loading: false,
    error: '',

    async fetchData() {
        this.loading = true;
        this.error = '';

        try {
            const options = {
                method: this.method,
                headers: this.headers,
            };

            if (this.payload) {
                try {
                    options.body = JSON.stringify(JSON.parse(this.payload));
                } catch (parseError) {
                    throw new Error('Invalid payload. Make sure it is valid JSON.');
                }
            }

            const response = await fetch(this.url, options);

            if (!response.ok) {
                throw new Error(`Error: ${response.status} ${response.statusText}`);
            }

            this.data = await response.json();
        } catch (err) {
            this.error = err.message;
        } finally {
            this.loading = false;
        }
    },

    setUrl(url) {
        this.url = url;
    },

    setMethod(method) {
        this.method = method;
    },

    setPayload(payload) {
        this.payload = payload;
    },


    setHeaders(headers) {
        this.headers = headers;
    },

    getData() {
        return this.data;
    }
});
