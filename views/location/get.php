<button id="add" onClick="location.href = '<?php echo BASE_URL; ?>location/add?building=<?php echo $this->buildingSelected?>'">Add new location</button>
    <main id="locations">
        <aside>
            <?php
            foreach($this->buildings as $building){
                echo "<button ";
                if($building['buildingID'] == $this->buildingSelected){
                    echo "class=\"selected\"";
                }
                echo" onclick=\"location.href='".BASE_URL."location?building=".$building['buildingID']."'\">"
                .$building['address']."</button>";
            }
            ?>
        </aside>
        <div>
            <table>
            <tr>
                <td>Row</td>
                <td>Shelf</td>
                <td>Edit</td>
                <td>Remove</td>
            </tr>
                <?php
            foreach($this->locations as $location){
                echo "<tr>";
                echo "<td>".$location['row']."</td>
                      <td>".$location['shelf']."</td>";
                echo "<td> <button onclick=\"location.href='".BASE_URL."location/change?id=".$location['locationID']."&building=".$this->buildingSelected."'\">Edit</button> </td>";
                echo "<td> <button onclick=\"location.href='".BASE_URL."location/delete?id=".$location['locationID']."&building=".$this->buildingSelected."'\">Remove</button> </td>";
                echo "</tr>";
            }
            ?>
        </table>
        </div>
        <?php
        ?>
    </main>