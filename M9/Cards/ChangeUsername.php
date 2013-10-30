<form action="Process.php" method="post">
    <div class="form-group">
        <h2>Change Username</h2>
        <input type="hidden" name="query" value="ChangeUsername" />
        <input type="hidden" name="UserId" id="ChangeUsernameId" value="" />
        <input type="email" placeholder="New Username" name="new" class="form-control" required /><br />
        <input type="submit" class="btn btn-primary" value="Change Username" />
    </div>
</form>