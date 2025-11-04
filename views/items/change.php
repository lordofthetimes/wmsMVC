        <div id="update">
            <form action="<?php echo BASE_URL; ?>items/change" method="post">
                <h1>Update Item</h1>
                <input type="hidden" name="itemID" value="<?= $this->item['itemID'] ?>">
                <input type="hidden" id="submit" name="submit" value="t" required>
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Name"  value="<?php echo $this->item['itemName']?>"  required>
                </div>
                <div>
                    <label for="typeID">Type:</label>
                    <select name="typeID" id="typeID" required>
                        <?php
                        foreach($this->types as $type){
                            echo "<option value='".$type['typeID']."'";
                            if($type['typeID'] == $this->item['itemType']){
                                echo " selected ";
                            }
                            echo ">".$type['itemType']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>