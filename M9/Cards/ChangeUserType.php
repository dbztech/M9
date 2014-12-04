<h1 class="lead">Change User Type</h1>
<form action="Process.php" method="post" class="validate-form">
    <div class="form-group">
        <input type="hidden" name="query" value="ChangeType" />
        <input type="hidden" name="UserId" id="ChangeTypeId" value="" />
        <select name="new" class="form-control">
            <option value="admin">Admin</option>
            <option value="standard">Standard</option>
        </select><br />
        <input type="submit" class="btn btn-primary" value="Change Type" />
    </div>
</form>