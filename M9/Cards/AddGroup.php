<h1 class="lead">Add Group</h1>
<form action="Process.php" method="post" class="validate-form">
    <div class="form-group">
        <input type="hidden" name="query" value="AddGroup" />
        <input type="hidden" name="UserId" id="addGroupUser" value="" />
        <div class="input-group">
          <span class="input-group-addon">#</span>
          <input type="text" placeholder="Group Name" name="group" class="form-control" required /><br />
        </div>
        <input type="submit" class="btn btn-primary" value="Add Group" />
    </div>
</form>