<h1>Users</h1>
<p><a href="#Users" onclick="Core.showId('ManageUsers')">Manage Users</a> &#8226 <a href="#Users" onclick="Core.showId('CreateUsers')">Create Users</a></p>
<div id="ManageUsers">
    <h2>Manage Users</h2>
    <?php user::userList(); ?>
    <form action="Process.php" method="post" id="ChangeUsername">
        <h3>Change Username</h3>
        <input type="hidden" name="query" value="ChangeUsername" />
        <input type="hidden" name="UserId" id="ChangeUsernameId" value="" />
        <input type="email" placeholder="New Username" name="new" required />
        <input type="submit" value="Change Username" />
    </form>
    <form action="Process.php" method="post" id="ChangePassword">
        <h3>Change Password</h3>
        <input type="hidden" name="query" value="ChangePassword" />
        <input type="hidden" name="UserId" id="ChangePasswordId" value="" />
        <input type="password" placeholder="Old Password" name="old" required />
        <input type="password" placeholder="New Password" name="new" required />
        <input type="password" placeholder="Repeat New Password" name="repeat" required />
        <input type="submit" value="Change Password" />
    </form>
    <form action="Process.php" method="post" id="ChangeType">
        <h3>Change User Type</h3>
        <input type="hidden" name="query" value="ChangeType" />
        <input type="hidden" name="UserId" id="ChangeTypeId" value="" />
        <select name="new">
            <option value="admin">Admin</option>
            <option value="standard">Standard</option>
        </select>
        <input type="submit" value="Change Type" />
    </form>
</div>
<div id="CreateUsers">
    <h2>Create Users</h2>
    <form action="Process.php" method="post">
        <input type="hidden" name="query" value="CreateUser" />
        <input type="email" placeholder="Email" name="username" required />
        <input type="password" placeholder="Password" required />
        <select name="type">
            <option value="admin">Admin</option>
            <option value="standard">Standard</option>
        </select>
        <input type="submit" value="Create User" />
    </form>
</div>