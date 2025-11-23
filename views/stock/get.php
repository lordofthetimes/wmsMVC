<button id="add" onClick="location.href = '<?php echo BASE_URL; ?>stock/add'">Add new entry</button>
<table id="stockTable">
    <tbody class="header">
        <tr>
            <td class="sortable" data-column="itemName">Name</td>
            <td class="sortable" data-column="itemType">Type</td>
            <td class="sortable" data-column="address">Address</td>
            <td class="sortable" data-column="row">Row</td>
            <td class="sortable" data-column="shelf">Shelf</td>
            <td class="sortable" data-column="quantity">Quantity</td>
            <td>Actions</td>
        </tr>
        <tr>
            <td><input type="text" id="filterName" placeholder="Filter by name"></td>
            <td><input type="text" id="filterType" placeholder="Filter by name"></td>
            <td><input type="text" id="filterAddress" placeholder="Filter by name"></td>
            <td><input type="text" id="filterRow" placeholder="Filter by name"></td>
            <td><input type="text" id="filterShelf" placeholder="Filter by name"></td>
            <td><input type="text" id="filterQuantity" placeholder="Filter by name"></td>
            <td><button id="clearFilters">Clear</button></td>
        </tr>
    </tbody>
    <tbody class="content">
    </tbody>
</table>
<script src="<?= BASE_URL; ?>assets/js/stock.js"></script>