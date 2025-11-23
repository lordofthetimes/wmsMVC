<nav>
        <div>
            <button onclick="location.href='<?php echo BASE_URL; ?>stock'">Stock</button>
            <button onclick="location.href='<?php echo BASE_URL; ?>location'">Locations</button>
            <button onclick="location.href='<?php echo BASE_URL; ?>items'">Items</button>
            <?php
                if($this->isAdmin($this->user)){
                    ?>
                    <button onclick="location.href='<?php echo BASE_URL; ?>employees'">Employees</button>
                    <?php
                }
            ?>
            <button id='logout' onclick="location.href='<?php echo BASE_URL; ?>login/logout'">Log out</button>
        </div>
</nav>