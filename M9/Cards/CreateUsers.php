<h2>Create User</h2>
<form action="Process.php" method="post">
    <div class="form-group">
        <input type="hidden" name="query" value="CreateUser" />
        <input type="email" placeholder="Email" name="username" class="form-control" required />
        <input type="password" placeholder="Password" name="password" class="form-control" required />
        <select name="type" class="form-control">
            <option value="admin">Admin</option>
            <option value="standard">Standard</option>
        </select><br />
        <input type="submit" class="btn btn-success" value="Create User" />
    </div>
</form>