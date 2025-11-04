        <div id="update">
            <form action="<?php echo BASE_URL; ?>location/change?building=<?= $this->buildingSelected ?>" method="post">
                <h1>Update Location</h1>
                <input type="hidden" name="locationID" value="<?= $this->location['locationID'] ?>">
                <input type="hidden" id="submit" name="submit" value="t" required>
                <div>
                    <label for="row">Row:</label>
                    <input type="text" id="row" name="row" placeholder="Row" value="<?= $this->location['row'] ?>" required>
                </div>
                <div>
                    <label for="shelf">Shelf:</label>
                    <input type="text" id="shelf" name="shelf" placeholder="Shelf" value="<?= $this->location['shelf'] ?>" required>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>