<h2>Create Data</h2>
<form action="Process.php" onsubmit="document.getElementById('CreateDataHidden').value = tinyMCE.get('CreateDataText').getContent({format : 'raw'});" method="post" style="width: 80%; margin: auto;">
    <script>tinymce.init({selector:'textarea#CreateDataText'});</script>
    <input type="hidden" name="query" value="CreateData" />
    <input type="hidden" name="data" value="" id="CreateDataHidden" />
    <input type="text" name="tag" placeholder="Tag" required />
    <br />
    <textarea id="CreateDataText" placeholder="Insert your content here..."></textarea>
    <br />
    <input type="submit" class="btn btn-success" value="Create Data" />
</form>