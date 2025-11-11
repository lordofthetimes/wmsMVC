    <table id="employeesTable">

                <tbody class="header">
                    <tr>
                        <td>Name</td>
                        <td>Surname</td>
                        <td>Position</td>
                        <td>Phone</td>
                        <td>E-Mail</td>
                        <td>Birth Date</td>
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