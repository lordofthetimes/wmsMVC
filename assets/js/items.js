let itemData = [];
let currentSort = { column: 'itemID', direction: 'ASC' };

const nameFilter = document.getElementById('filterName');
const typeFilter = document.getElementById('filterType');
const idFilter = document.getElementById('filterID');

// event listeners
nameFilter.addEventListener('input', applyFilters);
typeFilter.addEventListener('input', applyFilters);
idFilter.addEventListener('input', applyFilters);
document.getElementById('clearFilters').addEventListener('click', clearFilters);

document.querySelectorAll("#itemsTable .sortable").forEach(th => {
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
  tbody.innerHTML = '';

  data.forEach(item => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${item.itemID}</td>
      <td>${item.itemName}</td>`;

    if(IS_ADMIN){
      row.innerHTML += `
      <td>${item.itemType}</td>
      <td>
        <button onclick="location.href='${BASE_URL}items/change?id=${item.itemID}'">
          Change
        </button>
      </td>
      <td><input type="checkbox" class="selectItem" data-id="${item.itemID}"></td>
    `;
    
    }
    else{
      row.innerHTML+= `<td colspan=2>${item.itemType}</td>`;
    }

    tbody.appendChild(row);
  });
  updateSortArrows()
}

function applyFilters() {
  const filtered = itemData.filter(item => {
    return item.itemName.toLowerCase().includes(nameFilter.value.toLowerCase()) &&
           item.itemType.toLowerCase().includes(typeFilter.value.toLowerCase()) &&
           item.itemID.toLowerCase().includes(idFilter.value.toLowerCase());
  });

  renderItemTable(sortData(filtered));
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
    idFilter.value = '';
    nameFilter.value = '';
    typeFilter.value = '';
    currentSort = { column: 'itemID', direction: 'ASC' };
    renderItemTable(itemData);
}

document.getElementById('multidelete').addEventListener('click', () => {
  const selectedIds = Array.from(document.querySelectorAll('.selectItem:checked'))
      .map(checkbox => checkbox.dataset.id);

  if (selectedIds.length === 0) {
       alert('No items selected');
      return;
  }

  const confirmed = confirm('Are you sure you want to delete ' + selectedIds.length + ' selected items?');

  if (!confirmed) return;


  fetch(BASE_URL + 'location/delete', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
          ids: JSON.stringify(selectedIds)
      })
  })

  alert(`Deleted selected items successfully`);
  itemData = itemData.filter(
      item => !selectedIds.includes(item.itemID.toString())
  );
  applyFilters();
});