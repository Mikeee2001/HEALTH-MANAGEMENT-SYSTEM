<div class="modal  viewUserModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View User Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
            </div>
            <div class="modal-body">



                <div class="form-outline mb-3">
                    <input type="text" id="viewUsername" class="form-control" readonly />
                    <label class="form-label" for="viewUsername">Username</label>
                </div>

                <div class="form-outline mb-3">
                    <input type="text" id="viewUserfirstname" class="form-control" readonly />
                    <label class="form-label" for="viewUserfirstname">Firstname</label>
                </div>


                <div class="form-outline mb-3">
                    <input type="text" id="viewUserlastname" class="form-control" readonly />
                    <label class="form-label" for="viewUserlastname">Lastname</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="text" id="viewUserEmail" class="form-control" readonly />
                    <label class="form-label" for="viewUserEmail">Email</label>
                </div>

                <div class="form-outline mb-3">
                    <input type="text" id="viewUserCreated" class="form-control" readonly />
                    <label class="form-label" for="viewUserCreated">Created At</label>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
</div>
