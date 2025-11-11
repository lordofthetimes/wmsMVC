let employeesData = [];


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
      <td colspan=2>${employee.birthDate}</td>
    `;
    tbody.appendChild(row);
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

  renderEmployeesTable(filtered);
}

function clearFilters() {
    nameFilter.value = '';
    surnameFilter.value = '';
    positionFilter.value = '';
    phoneFilter.value = '';
    emailFilter.value = '';
    birthFilter.value = '';
    renderEmployeesTable(employeesData);
}
