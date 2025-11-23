<?php
    if($this->isAdmin($this->user)){
        ?>
        <button id="add" onClick="location.href = '<?php echo BASE_URL; ?>location/add?building=<?php echo $this->buildingSelected?>'">Add new location</button>
        <?php
    }
?>


    <main id="locations">
        <aside>
            <?php
            foreach($this->buildings as $building){
                echo "<button ";
                if($building['buildingID'] == $this->buildingSelected){
                    echo "class=\"selected\" value=\"".$building['buildingID']."\"";
                }
                echo" onclick=\"location.href='".BASE_URL."location?building=".$building['buildingID']."'\">"
                .$building['address']."</button>";
            }
            ?>
        </aside>
        <div>
            <table id="locationTable">
                <tbody class="header">
                    <tr>
                        <td class="sortable" data-column="row">Row</td>
                        <td class="sortable" data-column="shelf">Shelf</td>
                        <td colspan=2>Actions</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="filterRow" placeholder="Filter by name"></td>
                        <td><input type="text" id="filterShelf" placeholder="Filter by name"></td>
                        <td colspan=2><button id="clearFilters" style="width:100%">Clear</button></td>
                    </tr>
                </tbody>
                <tbody class="content">
                </tbody>
            </table>
        </div>
        <?php
        ?>
    </main>
<script src="<?= BASE_URL; ?>assets/js/location.js"></script>