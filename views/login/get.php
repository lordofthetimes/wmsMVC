<form id="login" action="<?php echo BASE_URL; ?>login/get" method="post" id="login">
    <h1>Log in</h1>
    <input type="hidden" id="submit" name="submit" value="t" required>
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Log in</button>
</form>