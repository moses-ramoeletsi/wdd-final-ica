<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
<div class="create-user">
    <p><a href="admin.php">Back</a></p>
    <h3>Create New User</h3>
    <form action="registration_process.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="role">Role:</label><br>
        <select id="role" name="role">
            <option value="Admin">Admin</option>
            <option value="City Administrator">City Administrator</option>
            <option value="City Surveyor">City Surveyor</option>
            <option value="Contractor">Contractor</option>
        </select><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>