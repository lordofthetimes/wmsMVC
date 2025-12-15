let employeesData = [];
let currentSort = { column: 'name', direction: 'ASC' };

const nameFilter = document.getElementById('filterName');
const surnameFilter = document.getElementById('filterSurname');
const positionFilter = document.getElementById('filterPosition');
const phoneFilter = document.getElementById('filterPhone');
const emailFilter = document.getElementById('filterEmail');
const birthFilter = document.getElementById('filterBirth');

// event listeners
nameFilter.addEventListener('input', applyFilters);
surnameFilter.addEventListener('input', applyFilters);
positionFilter.addEventListener('input', applyFilters);
phoneFilter.addEventListener('input', applyFilters);
emailFilter.addEventListener('input', applyFilters);
birthFilter.addEventListener('input', applyFilters);
document.getElementById('clearFilters').addEventListener('click', clearFilters);

document.querySelectorAll("#employeesTable .sortable").forEach(th => {
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
fetch(BASE_URL + 'employees/getEmployeesData')
  .then(res => {
    if (!res.ok) throw new Error(res.status);
    return res.json();
  })
  .then(data => {
    employeesData = data;
    renderEmployeesTable(employeesData);
  })
  .catch(err => console.error('Error fetching employees data:', err));

function renderEmployeesTable(data) {
  const tbody = document.querySelector('#employeesTable tbody.content');
  tbody.innerHTML = '';

  data.forEach(employee => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${employee.name}</td>
      <td>${employee.surname}</td>
      <td>${employee.position}</td>
      <td>${employee.phoneNumber}</td>
      <td>${employee.email}</td>
      <td>${employee.birthDate}</td>
      <td><input type="checkbox" class="selectEmployee" data-id="${employee.employeeID}"></td>
    `;
    tbody.appendChild(row);
  });
  updateSortArrows();
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

function applyFilters() {
  const filtered = employeesData.filter(employee => {
    return employee.name.toLowerCase().includes(nameFilter.value.toLowerCase()) &&
           employee.surname.toLowerCase().includes(surnameFilter.value.toLowerCase()) &&
           employee.position.toLowerCase().includes(positionFilter.value.toLowerCase()) &&
           employee.phoneNumber.toLowerCase().includes(phoneFilter.value.toLowerCase()) &&
           employee.email.toLowerCase().includes(emailFilter.value.toLowerCase()) &&
           employee.birthDate.includes(birthFilter.value.toLowerCase());
  });

  renderEmployeesTable(sortData(filtered));
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

function clearFilters() {
    nameFilter.value = '';
    surnameFilter.value = '';
    positionFilter.value = '';
    phoneFilter.value = '';
    emailFilter.value = '';
    birthFilter.value = '';
    currentSort = { column: 'name', direction: 'ASC' };
    renderEmployeesTable(employeesData);
}

document.getElementById('multidelete').addEventListener('click', () => {
  const selectedIds = Array.from(document.querySelectorAll('.selectEmployee:checked'))
      .map(checkbox => checkbox.dataset.id);

  if (selectedIds.length === 0) {
       alert('No items selected');
      return;
  }

  const confirmed = confirm('Are you sure you want to delete ' + selectedIds.length + ' selected emplooyes?');

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

  alert(`Deleted selected employees successfully`);
  employeesData = employeesData.filter(
      employee => !selectedIds.includes(employee.employeeID.toString())
  );
  applyFilters();
});
