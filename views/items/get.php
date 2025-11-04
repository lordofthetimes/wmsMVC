<button id="add" onClick="location.href = '<?php echo BASE_URL; ?>items/add'">Add new location</button>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Type</td>
            <td>Change</td>
            <td>Delete</td>
        </tr>
        <?php
        foreach($this->items as $items){
            echo "<tr>";
            echo "<td>".$items['itemID']."</td>
            <td>".$items['itemName']."</td> 
            <td>".$items['itemType']."</td>";
            echo "<td> <button onclick=\"location.href='".BASE_URL."items/change?id=".$items['itemID']."'\">Change</button> </td>";
            echo "<td> <button onclick=\"location.href='".BASE_URL."items/delete?id=".$items['itemID']."'\">Delete</button> </td>";
            echo "</tr>";
        }
        ?>
</table>