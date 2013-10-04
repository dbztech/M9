<form action="Process.php" method="post">
    <h2>Change Password</h2>
    <input type="hidden" name="query" value="ChangePassword" />
    <input type="hidden" name="UserId" id="ChangePasswordId" value="" />
    <input type="password" placeholder="Old Password" name="old" required />
    <input type="password" placeholder="New Password" name="new" required />
    <input type="password" placeholder="Repeat New Password" name="repeat" required />
    <input type="submit" value="Change Password" />
</form>