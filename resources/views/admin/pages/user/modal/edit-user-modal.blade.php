<!-- User Modal -->
<div class="modal editUserModal" tabindex="-1">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>



                <div class="modal-body">
                    <div class="form-outline mb-3">
                        <input type="text" id="updateUsername" class="form-control" />
                        <label class="form-label" for="username">Update Username</label>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="text" id="updateUserFirstname" class="form-control" />
                        <label class="form-label" for="firstname">Update User FirstName</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="updateUserLastname" class="form-control" />
                        <label class="form-label" for="lastname">Update User Lastname</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="updateUserEmail" class="form-control" />
                        <label class="form-label" for="email">Update User Email</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="updateUserPassword" class="form-control" />
                        <label class="form-label" for="updateUserpassword">Update User Password (Optional)</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="saveEditUser" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                 </div>
            </div>
        </div>
    </div>
</div>
