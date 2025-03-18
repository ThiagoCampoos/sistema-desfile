export default () => ({
    visibleClientId: null, 

    toggleInvoices(url, clientId) {
        const container = document.getElementById(`invoices-container-${clientId}`);
        const tbody = document.getElementById(`invoices-body-${clientId}`);

        if (this.visibleClientId === clientId) {
            container.style.display = "none";
            this.visibleClientId = null;
            return;
        }

        this.visibleClientId = clientId;
        container.style.display = "table-row";
    
        fetch(url)
            .then(response => response.json())
            .then(data => {
                this.populateInvoices(tbody, data.data, data.links);
            })
            .catch(error => console.error("Erro ao buscar invoices:", error));
        
    },

    populateInvoices(tbody, invoices, links) {
        tbody.innerHTML = "";
    
        // Popula os invoices na tabela
        invoices.forEach(invoice => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${invoice.invoice_number}</td>
                <td>${new Date(invoice.issue_date).toLocaleDateString('pt-BR')}</td>
                <td>R$ ${parseFloat(invoice.total_amount).toFixed(2)}</td>
                <td>${invoice.status}</td>
            `;
            tbody.appendChild(row);
        });
    
        // Adiciona a paginação
        const paginationContainer = document.createElement("div");
        paginationContainer.classList.add("pagination-container");
        paginationContainer.innerHTML = links.map(link => {
            const activeClass = link.active ? "active" : "";
            return `<a href="${link.url}" class="pagination-link ${activeClass}" data-url="${link.url}">${link.label}</a>`;
        }).join("");
        
        tbody.appendChild(paginationContainer);
    
        // Adiciona o evento de clique para os links de paginação
        const paginationLinks = paginationContainer.querySelectorAll(".pagination-link");
        paginationLinks.forEach(link => {
            link.addEventListener("click", (event) => {
                event.preventDefault();
                const url = link.getAttribute("data-url");
                if (url) {
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            this.populateInvoices(tbody, data.data, data.links);
                        })
                        .catch(error => console.error("Erro ao carregar a paginação:", error));
                }
            });
        });
    }
    
});
