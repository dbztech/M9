<h2>Create Users</h2>
<form action="Process.php" method="post">
    <input type="hidden" name="query" value="CreateUser" />
    <input type="email" placeholder="Email" name="username" required />
    <input type="password" placeholder="Password" name="password" required />
    <select name="type">
        <option value="admin">Admin</option>
        <option value="standard">Standard</option>
    </select>
    <input type="submit" value="Create User" />
</form>