<script>
$(document).ready(function () {

    $('#memberModal').modal('show');

});


</script>



<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                 <h4 class="modal-title" id="memberModalLabel">Thank you for signing in!</h4>

            </div>
            <div class="modal-body">
                <p>However the account provided is not known.
                    <BR>If you just got invited to the group, please wait for a day to have the database synchronized.</p>
                <p>You will now be shown the Demo site.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>