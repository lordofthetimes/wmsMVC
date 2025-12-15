let stockData = [];
let currentSort = { column: 'itemName', direction: "ASC" }; // default sort by Name

document.addEventListener("DOMContentLoaded", () => {

    // Filter inputs
    const nameFilter = document.getElementById('filterName');
    const typeFilter = document.getElementById('filterType');
    const addressFilter = document.getElementById('filterAddress');
    const rowFilter = document.getElementById('filterRow');
    const shelfFilter = document.getElementById('filterShelf');
    const quantityFilter = document.getElementById('filterQuantity');

    nameFilter.addEventListener('input', applyFilters);
    typeFilter.addEventListener('input', applyFilters);
    addressFilter.addEventListener('input', applyFilters);
    rowFilter.addEventListener('input', applyFilters);
    shelfFilter.addEventListener('input', applyFilters);
    quantityFilter.addEventListener('input', applyFilters);
    document.getElementById('clearFilters').addEventListener('click', clearFilters);

    // sorting
    document.querySelectorAll(".sortable").forEach(th => {
        th.addEventListener("click", () => {
            const col = th.dataset.column;
            if (currentSort.column === col) {
                currentSort.direction = currentSort.direction === "ASC" ? "DESC" : "ASC";
            } else {
                currentSort.column = col;
                currentSort.direction = "ASC";
            }
            applyFilters();
        });
    });

    // Fetch stock data
    fetch(BASE_URL + 'stock/getStockData')
      .then(res => {
        if (!res.ok) throw new Error(res.status);
        return res.json();
      })
      .then(data => {
        stockData = data;
        applyFilters();
      })
      .catch(err => console.error('Error fetching stock data:', err));

    function renderStockTable(data) {
        const tbody = document.querySelector('#stockTable tbody.content');
        tbody.innerHTML = '';
        data.forEach(stock => {
            tbody.innerHTML += `
            <tr>
                <td>${stock.itemName}</td>
                <td>${stock.itemType}</td>
                <td>${stock.address}</td>
                <td>${stock.row}</td>
                <td>${stock.shelf}</td>
                <td>${stock.quantity}</td>
                <td><button onclick="location.href='${BASE_URL}stock/change?id=${stock.storedID}'">Change</button></td>
                <td><input type="checkbox" class="selectStock" data-id="${stock.storedID}"></td>
            </tr>
            `;
        });
        updateSortArrows();
    }

    function applyFilters() {
        const filtered = stockData.filter(item => {
            return item.itemName.toLowerCase().includes(nameFilter.value.toLowerCase()) &&
                   item.itemType.toLowerCase().includes(typeFilter.value.toLowerCase()) &&
                   item.address.toLowerCase().includes(addressFilter.value.toLowerCase()) &&
                   item.row.toLowerCase().includes(rowFilter.value.toLowerCase()) &&
                   item.shelf.toLowerCase().includes(shelfFilter.value.toLowerCase()) &&
                   item.quantity.toString().toLowerCase().includes(quantityFilter.value.toLowerCase());
        });
        renderStockTable(sortData(filtered));
    }

    function sortData(data) {
        if (!currentSort.column) return data;
        const sorted = [...data].sort((a, b) => {
            return a[currentSort.column].toString().localeCompare(
                b[currentSort.column].toString(),
                undefined,
                { numeric: true, sensitivity: "base" }
            );
        });
        return currentSort.direction === "ASC" ? sorted : sorted.reverse();
    }

    function updateSortArrows() {
        document.querySelectorAll('.sortable').forEach(th => {
            const arrow = th.querySelector('.sort-arrow');
            arrow.textContent = '';

            if (th.dataset.column === currentSort.column) {
                arrow.textContent = currentSort.direction === 'ASC' ? '▲' : '▼';
            }
        });
    }


    function clearFilters() {
        nameFilter.value = '';
        typeFilter.value = '';
        addressFilter.value = '';
        rowFilter.value = '';
        shelfFilter.value = '';
        quantityFilter.value = '';
        currentSort = { column: 'itemName', direction: "ASC" };
        applyFilters();
    }

    document.getElementById('multidelete').addEventListener('click', () => {
        const selectedIds = Array.from(document.querySelectorAll('.selectStock:checked'))
            .map(checkbox => checkbox.dataset.id);

        if (selectedIds.length === 0) {
            alert('No items selected');
            return;
        }

        const confirmed = confirm('Are you sure you want to delete ' + selectedIds.length + ' selected items?');

        if (!confirmed) return;


        fetch(BASE_URL + 'stock/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                ids: JSON.stringify(selectedIds)
            })
        })

        alert(`Deleted selected items successfully`);
        stockData = stockData.filter(
            stock => !selectedIds.includes(stock.storedID.toString())
        );
        applyFilters(stockData);
        
    });

});
