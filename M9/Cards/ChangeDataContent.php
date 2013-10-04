<form action="Process.php" method="post">
    <h3>Change Data</h3>
    <input type="hidden" name="query" value="ChangeData" />
    <input type="hidden" name="DataId" value="" id="ChangeDataId" />
    <textarea name="new" value="" id="ChangeDataText" required></textarea>
    <br />
    <input type="submit" value="Update Data" />
</form>