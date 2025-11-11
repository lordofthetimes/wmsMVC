let itemData = [];


const nameFilter = document.getElementById('filterName');
const typeFilter = document.getElementById('filterType');
const idFilter = document.getElementById('filterID');

// event listeners
nameFilter.addEventListener('input', applyFilters);
typeFilter.addEventListener('input', applyFilters);
idFilter.addEventListener('input', applyFilters);
document.getElementById('clearFilters').addEventListener('click', clearFilters);

// Fetch stock data
fetch(BASE_URL + 'items/getItemsData')
  .then(res => {
    if (!res.ok) throw new Error(res.status);
    return res.json();
  })
  .then(data => {
    itemData = data;
    renderItemTable(itemData);
  })
  .catch(err => console.error('Error fetching stock data:', err));

function renderItemTable(data) {
  const tbody = document.querySelector('#itemsTable tbody.content');
  tbody.innerHTML = ''; // clear table

  data.forEach(item => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${item.itemID}</td>
      <td>${item.itemName}</td>
      <td>${item.itemType}</td>
      <td>
        <button onclick="location.href='${BASE_URL}items/change?id=${item.itemID}'">
          Change
        </button>
      </td>
      <td>
        <button onclick="location.href='${BASE_URL}items/delete?id=${item.itemID}'">
          Delete
        </button>
      </td>
    `;
    tbody.appendChild(row);
  });
}

function applyFilters() {
  const filtered = itemData.filter(item => {
    return item.itemName.toLowerCase().includes(nameFilter.value.toLowerCase()) &&
           item.itemType.toLowerCase().includes(typeFilter.value.toLowerCase()) &&
           item.itemID.toLowerCase().includes(idFilter.value.toLowerCase());
  });

  renderItemTable(filtered);
}

function clearFilters() {
    idFilter.value = '';
    nameFilter.value = '';
    typeFilter.value = '';
    renderItemTable(itemData);
}
