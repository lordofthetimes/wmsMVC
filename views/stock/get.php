<button id="add" onClick="location.href = '<?php echo BASE_URL; ?>stock/add'">Add new entry</button>
<table>
    <tr>
        <td>Name</td>
        <td>Type</td>
        <td>Building</td>
        <td>Row</td>
        <td>Shelf</td>
        <td>Amount</td>
        <td>Change</td>
    </tr>
    <?php
    foreach($this->stock as $record){
        echo "<tr>";
        echo "<td>".$record['itemName']."</td> 
        <td>".$record['itemType']."</td>
        <td>".$record['address']."</td>
        <td>".$record['row']."</td>
        <td>".$record['shelf']."</td>
        <td>".$record['quantity']."</td>";
        echo "<td> <button onclick=\"location.href='".BASE_URL."stock/change?id=".$record['storedID']."'\">Change</button> </td>";
        echo "</tr>";
    }
    ?>
</table>