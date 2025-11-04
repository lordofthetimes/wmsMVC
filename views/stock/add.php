<div id="update">
            <form action="<?php echo BASE_URL; ?>stock/add" method="post">
                <h1>Add new entry</h1>
                <input type="hidden" id="submit" name="submit" value="t" required>

                <div>
                    <label for="itemID">Item:</label>
                    <select name="itemID" id="itemID" required>
                        <?php
                        foreach($this->items as $item){
                            echo "<option value='".$item['itemID']."'>".$item['itemName']."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="locationID">Location:</label>
                    <select name="locationID" id="locationID" required>
                        <?php
                        foreach($this->locationsGroup as $address => $locations){
                            echo "<optgroup label=\"".$address."\">";
                            foreach($locations as $location){
                                echo "<option value='".$location['locationID']."'> Row ".$location['row']." | Shelf ".$location['shelf']."</option>";
                            }
                            echo "</optgroup>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" placeholder="Quantity" value="<?= $edit['quantity'] ?>" required>
                </div>

                <button type="submit">Add</button>
            </form>
</div>