<div id="update">
            <form action="<?php echo BASE_URL; ?>stock/change"  method="post">
                <h1>Change Quantity</h1>
                <input type="hidden" name="storedID" value="<?php echo $this->stock['storedID'];?>">
                <input type="hidden" id="submit" name="submit" value="t" required>
                <div>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" placeholder="Quantity" value="<?php echo $this->stock['quantity']; ?>" required>
            </div>
            <button type="submit">Change</button>
        </form>
</div>