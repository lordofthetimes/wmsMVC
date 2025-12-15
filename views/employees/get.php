    <div class="mainButtons">
        <button id="add" onClick="location.href = '<?php echo BASE_URL; ?>employees/add'">Add new Employee</button>
        <button id="multidelete">Delete selected entries</button> 
    </div>
    <table id="employeesTable">
            <tbody class="header">
                <tr>
                    <td class="sortable" data-column="name">Name <span class="sort-arrow"></td>
                    <td class="sortable" data-column="surname">Surname <span class="sort-arrow"></td>
                    <td class="sortable" data-column="position">Position <span class="sort-arrow"></td>
                    <td class="sortable" data-column="phoneNumber">Phone <span class="sort-arrow"></td>
                    <td class="sortable" data-column="email">E-Mail <span class="sort-arrow"></td>
                    <td class="sortable" data-column="birthDate">Birth Date <span class="sort-arrow"></td>
                    <td>Actions</td>
                </tr>
                <tr>
                    <td><input type="text" id="filterName" placeholder="Filter by name"></td>
                    <td><input type="text" id="filterSurname" placeholder="Filter by surname"></td>
                    <td><input type="text" id="filterPosition" placeholder="Filter by position"></td>
                    <td><input type="text" id="filterPhone" placeholder="Filter by phone"></td>
                    <td><input type="text" id="filterEmail" placeholder="Filter by e-mail"></td>
                    <td><input type="text" id="filterBirth" placeholder="Filter by birth date"></td>
                    <td><button id="clearFilters" style="width:100%">Clear</button></td>
                </tr>
            </tbody>
            <tbody class="content">
            </tbody>
</table>
<script src="<?= BASE_URL; ?>assets/js/employees.js"></script>