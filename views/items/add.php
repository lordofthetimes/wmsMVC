<div id="update">
            <form action="<?php echo BASE_URL; ?>items/add" method="post">
                <h1>Add Item</h1>
                <input type="hidden" id="submit" name="submit" value="t" required>
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div>
                    <label for="typeID">Type:</label>
                    <select name="typeID" id="typeID" required>
                        <?php
                        foreach($this->types as $type){
                            echo "<option value='".$type['typeID']."'>".$type['itemType']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit">Add</button>
            </form>
</div>