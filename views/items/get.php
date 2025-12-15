<?php
    if($this->isAdmin($this->user)){
        ?>
        <div class="mainButtons">
            <button id="add" onClick="location.href = '<?php echo BASE_URL; ?>items/add'">Add new item</button>
            <button id="multidelete">Delete selected entries</button> 
        </div>
        <?php
    }
?>
    <table id="itemsTable">

                <tbody class="header">
                    <tr>
                        <td class="sortable" data-column="itemID">ID <span class="sort-arrow"></td>
                        <td class="sortable" data-column="itemName">Name <span class="sort-arrow"></td>
                        <td class="sortable" data-column="itemType">Type <span class="sort-arrow"></td>
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