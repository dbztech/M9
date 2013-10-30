<form action="Process.php" method="post">
    <div class="form-group">
        <h3>Change Tag</h3>
        <input type="hidden" name="query" value="ChangeTag" />
        <input type="hidden" name="DataId" value="" id="ChangeTagId" />
        <input type="text" name="new" placeholder="New tag name" class="form-control" required /><br />
        <input type="submit" class="btn btn-primary" value="Update Data" />
    </div>
</form>