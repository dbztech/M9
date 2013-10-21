<form action="Process.php" method="post">
    <h2>Change Password</h2>
    <input type="hidden" name="query" value="ChangePassword" />
    <input type="hidden" name="UserId" id="ChangePasswordId" value="" />
    <!--<input type="password" placeholder="Old Password" name="old" required /><br />-->
    <input type="password" placeholder="New Password" name="new" required /><br />
    <input type="password" placeholder="Repeat New Password" name="repeat" required /><br />
    <input type="submit" class="btn btn-primary" value="Change Password" />
</form>