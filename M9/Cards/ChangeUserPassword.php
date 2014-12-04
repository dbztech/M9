<form action="Process.php" method="post">
    <div class="form-group">
    <h1 class="lead">Change Password</h1>
        <input type="hidden" name="query" value="ChangePassword" />
        <input type="hidden" name="UserId" id="ChangePasswordId" value="" />
        <!--<input type="password" placeholder="Old Password" name="old" required /><br />-->
        <input type="password" placeholder="New Password" name="new" class="form-control" required />
        <input type="password" placeholder="Repeat New Password" name="repeat" class="form-control" required /><br />
        <input type="submit" class="btn btn-primary" value="Change Password" />
    </div>
</form>