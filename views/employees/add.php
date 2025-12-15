<div id="update">
    <form action="<?php echo BASE_URL; ?>employees/add" method="post" style="height: 65vh;">
        <h1>Add Employee</h1>
        <input type="hidden" id="submit" name="submit" value="t" required>
        
        <div>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
        </div>
        
        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
        </div>
        
        <div>
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" placeholder="Position" required>
        </div>
        
        <div>
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
        </div>
        
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        
        <div>
            <label for="birthDate">Birth Date:</label>
            <input type="date" id="birthDate" name="birthDate" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Address" required>
        </div>
        <button type="submit">Add</button>
    </form>
</div>