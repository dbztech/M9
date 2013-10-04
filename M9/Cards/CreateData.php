<h2>Create Data</h2>
<form action="Process.php" method="post">
    <input type="hidden" name="query" value="CreateData" />
    <input type="text" name="tag" placeholder="Tag" required />
    <br />
    <textarea name="data" placeholder="Insert your content here..." required></textarea>
    <br />
    <input type="submit" value="Create Data" />
</form>