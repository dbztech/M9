<h1 class="lead">Change Data</h1>
<form id="ChangeDataForm" action="Process.php" onsubmit="document.getElementById('ChangeDataHidden').value = tinyMCE.get('ChangeDataText').getContent({format : 'raw'});" method="post" style="width: 80%; margin: auto;" class="validate-form">
    <div class="form-group" style="width: 100%;">
    <script>tinymce.init({selector:'textarea#ChangeDataText', plugins: "code", height: 400});</script>
        <input type="hidden" name="query" value="ChangeData" />
        <input type="hidden" name="DataId" value="" id="ChangeDataId" />
        <input type="hidden" name="new" value="" id="ChangeDataHidden" />
        <textarea value="" id="ChangeDataText"></textarea>
        <br />
        <input type="submit" class="btn btn-primary" value="Update Data" />
    </div>
</form>