<!-- Doctor Modal -->
<div class="modal addUserModal" tabindex="-1">

    {{-- <div class="modal doctorModal" tabindex="-1" role="dialog"> --}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal()" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>



                <div class="modal-body">
                    <div class="form-outline mb-3">
                        <input type="text" id="addUsername" class="form-control" />
                        <label class="form-label" for="firstname">Enter Username</label>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="text" id="addUserfirstname" class="form-control" />
                        <label class="form-label" for="firstname">Enter User FirstName</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="addUserlastname" class="form-control" />
                        <label class="form-label" for="lastname">Enter User Lastname</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="addUserEmail" class="form-control" />
                        <label class="form-label" for="specialty">Enter User Email</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="addUserPassword" class="form-control" />
                        <label class="form-label" for="password">Enter User Password</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="saveUserButton" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>                </div>
            </div>
        </div>
    </div>
</div>
