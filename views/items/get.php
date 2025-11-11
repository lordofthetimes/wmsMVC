<button id="add" onClick="location.href = '<?php echo BASE_URL; ?>items/add'">Add new location</button>
    <table id="itemsTable">

                <tbody class="header">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Type</td>
                        <td colspan=2>Actions</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="filterID" placeholder="Filter by id"></td>
                        <td><input type="text" id="filterName" placeholder="Filter by name"></td>
                        <td><input type="text" id="filterType" placeholder="Filter by type"></td>
                        <td colspan=2><button id="clearFilters" style="width:100%">Clear</button></td>
                    </tr>
                </tbody>
                <tbody class="content">
                </tbody>
</table>
<script src="<?= BASE_URL; ?>assets/js/items.js"></script>