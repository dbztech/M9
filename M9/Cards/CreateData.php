<h1 class="lead">Create Data</h1>
<form action="Process.php" onsubmit="document.getElementById('CreateDataHidden').value = tinyMCE.get('CreateDataText').getContent({format : 'raw'});" method="post" style="width: 80%; margin: auto;" class="validate-form">
    <div class="form-group" style="width: 100%;">
        <script>tinymce.init({selector:'textarea#CreateDataText', plugins: "code", height: 400});</script>
        <input type="hidden" name="query" value="CreateData" />
        <input type="hidden" name="data" value="" id="CreateDataHidden" />
        <input type="text" name="tag" placeholder="Tag" class="form-control" style="width: 250px; margin: auto;" required />
        <br />
        <textarea id="CreateDataText" placeholder="Insert your content here..."></textarea>
        <br />
        <input type="submit" class="btn btn-success" value="Create Data" />
    </div>
</form>