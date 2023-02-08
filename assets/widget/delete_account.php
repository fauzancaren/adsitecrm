<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete_leads">
    Launch demo modal
</button>
-->
<!-- Modal -->
<div class="modal fade" id="delete_account">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Account</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to delete this account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="/process/delete_account.php?id=<?php echo $id; ?>" type="button" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>