let stockData = [];


const nameFilter = document.getElementById('filterName');
const typeFilter = document.getElementById('filterType');
const addressFilter = document.getElementById('filterAddress');
const rowFilter = document.getElementById('filterRow');
const shelfFilter = document.getElementById('filterShelf');
const quantityFilter = document.getElementById('filterQuantity');

// event listeners
nameFilter.addEventListener('input', applyFilters);
typeFilter.addEventListener('input', applyFilters);
addressFilter.addEventListener('input', applyFilters);
rowFilter.addEventListener('input', applyFilters);
shelfFilter.addEventListener('input', applyFilters);
quantityFilter.addEventListener('input', applyFilters);
document.getElementById('clearFilters').addEventListener('click', clearFilters);

// Fetch stock data
fetch(BASE_URL + 'stock/getStockData')
  .then(res => {
    if (!res.ok) throw new Error(res.status);
    return res.json();
  })
  .then(data => {
    stockData = data;
    renderStockTable(stockData);
  })
  .catch(err => console.error('Error fetching stock data:', err));

function renderStockTable(data) {
  const tbody = document.querySelector('#stockTable tbody.content');
  tbody.innerHTML = '';

  data.forEach(stock => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${stock.itemName}</td>
      <td>${stock.itemType}</td>
      <td>${stock.address}</td>
      <td>${stock.row}</td>
      <td>${stock.shelf}</td>
      <td>${stock.quantity}</td>
      <td>
        <button onclick="location.href='${BASE_URL}stock/change?id=${stock.storedID}'">Change</button>
      </td>
    `;
    tbody.appendChild(row);
  });
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

  renderStockTable(filtered);
}

function clearFilters() {
    nameFilter.value = '';
    typeFilter.value = '';
    addressFilter.value = '';
    rowFilter.value = '';
    shelfFilter.value = '';
    quantityFilter.value = '';
    renderStockTable(stockData);
}
