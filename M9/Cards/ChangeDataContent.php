<form id="ChangeDataForm" action="Process.php" onsubmit="document.getElementById('ChangeDataHidden').value = tinyMCE.get('ChangeDataText').getContent({format : 'raw'});" method="post" style="width: 80%; margin: auto;">
    <script>tinymce.init({selector:'textarea#ChangeDataText'});</script>
    <h3>Change Data</h3>
    <input type="hidden" name="query" value="ChangeData" />
    <input type="hidden" name="DataId" value="" id="ChangeDataId" />
    <input type="hidden" name="new" value="" id="ChangeDataHidden" />
    <textarea value="" id="ChangeDataText"></textarea>
    <br />
    <input type="submit" class="btn btn-primary" value="Update Data" />
</form>