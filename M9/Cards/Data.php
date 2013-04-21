<h1>Data</h1>
<p><a href="#Data" onclick="Core.showId('ManageData')">Manage Data</a> &#8226 <a href="#Data" onclick="Core.showId('CreateData')">Create Data</a></p>
<div id="ManageData">
    <h2>Manage Data</h2>
    <?php data::dataList(); ?>
    <form action="Process.php" method="post" id="ChangeTag">
        <h3>Change Tag</h3>
        <input type="hidden" name="query" value="ChangeTag" />
        <input type="hidden" name="DataId" value="" id="ChangeTagId" />
        <input type="text" name="new" placeholder="New tag name" required />
        <input type="submit" value="Update Data" />
    </form>
    
    <form action="Process.php" method="post" id="ChangeData">
        <h3>Change Data</h3>
        <input type="hidden" name="query" value="ChangeData" />
        <input type="hidden" name="DataId" value="" id="ChangeDataId" />
        <textarea name="new" value="" id="ChangeDataText" required></textarea>
        <br />
        <input type="submit" value="Update Data" />
    </form>
</div>
<div id="CreateData">
    <h2>Create Data</h2>
    <form action="Process.php" method="post">
        <input type="hidden" name="query" value="CreateData" />
        <input type="text" name="tag" placeholder="Tag" required />
        <br />
        <textarea name="data" placeholder="Insert your content here..." required></textarea>
        <br />
        <input type="submit" value="Create Data" />
    </form>
</div>