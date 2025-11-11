let locationsData = [];


const rowFilter = document.getElementById('filterRow');
const shelfFilter = document.getElementById('filterShelf');

// event listeners
rowFilter.addEventListener('input', applyFilters);
shelfFilter.addEventListener('input', applyFilters);
document.getElementById('clearFilters').addEventListener('click', clearFilters);

// Fetch location data
fetch(BASE_URL + 'location/getLocationsData?building=' + document.querySelector('.selected').value)
  .then(res => {
    if (!res.ok) throw new Error(res.status);
    return res.json();
  })
  .then(data => {
    locationsData = data;
    renderLocationTable(locationsData);
  })
  .catch(err => console.error('Error fetching location data:', err));

function renderLocationTable(data) {
  const tbody = document.querySelector('#locationTable tbody.content');
  tbody.innerHTML = '';

  data.forEach(location => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${location.row}</td>
      <td>${location.shelf}</td>
      <td>
        <button onclick="location.href='${BASE_URL}location/change?id=${location.locationID}&building=${location.buildingID}'">
          Edit
        </button>
      </td>
      <td>
        <button onclick="location.href='${BASE_URL}location/delete?id=${location.locationID}&building=${location.buildingID}'">
          Remove
        </button>
      </td>
    `;
    tbody.appendChild(row);
  });
}


function applyFilters() {
  const filtered = locationsData.filter(location => {
    return location.row.toLowerCase().includes(rowFilter.value.toLowerCase()) &&
           location.shelf.toLowerCase().includes(shelfFilter.value.toLowerCase())
  });

  renderLocationTable(filtered);
}

function clearFilters() {
    rowFilter.value = '';
    shelfFilter.value = '';
    renderLocationTable(locationsData);
}
