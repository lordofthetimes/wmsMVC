<div id="update">
            <form action="<?php echo BASE_URL; ?>location/add?building=<?= $this->buildingSelected ?>" method="post">
                <h1>Add Location</h1>
                <input type="hidden" name="buildingID" value="<?= $this->buildingSelected?>">
                <input type="hidden" id="submit" name="submit" value="t" required>
                <div>
                    <label for="row">Row:</label>
                    <input type="text" id="row" name="row" placeholder="Row" required>
                </div>
                <div>
                    <label for="shelf">Shelf:</label>
                    <input type="text" id="shelf" name="shelf" placeholder="Shelf" required>
                </div>
                <button type="submit">Add</button>
            </form>
</div>