<h2>Manage Users</h2>
<?php user::userList(); ?>
<!-- Modal -->
<div class="modal fade" id="removeGroupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="color: black;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Remove Group</h4>
      </div>
      <div class="modal-body" id="removeGroupModalBody">
        Are you sure you want to remove group X from Y
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Remove Group</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->