<h2>Create Users</h2>
<form action="Process.php" method="post">
    <input type="hidden" name="query" value="CreateUser" /><br />
    <input type="email" placeholder="Email" name="username" required /><br />
    <input type="password" placeholder="Password" name="password" required /><br />
    <select name="type">
        <option value="admin">Admin</option>
        <option value="standard">Standard</option>
    </select><br />
    <input type="submit" class="btn btn-success" value="Create User" />
</form>