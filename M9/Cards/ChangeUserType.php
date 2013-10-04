<form action="Process.php" method="post">
    <h2>Change User Type</h2>
    <input type="hidden" name="query" value="ChangeType" />
    <input type="hidden" name="UserId" id="ChangeTypeId" value="" />
    <select name="new">
        <option value="admin">Admin</option>
        <option value="standard">Standard</option>
    </select>
    <input type="submit" value="Change Type" />
</form>