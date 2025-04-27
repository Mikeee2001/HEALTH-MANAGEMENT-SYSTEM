<!-- Doctor Modal -->
<div class="modal fade editDoctorModal" tabindex="-1" role="dialog">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                {{-- <div class="form-outline mb-3">
                    <input type="file" id="doctor_image" class="form-control" accept="image/*" />
                    <label class="form-label" for="doctor_image"></label>
                </div> --}}

                <div class="modal-body">
                    <div class="form-outline mb-3">
                        <input type="text" id="updateFirstname" class="form-control" />
                        <label class="form-label" for="firstname">First Name</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="updateLastname" class="form-control" />
                        <label class="form-label" for="lastname">Last Name</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="updateSpecialty" class="form-control" />
                        <label class="form-label" for="specialty">Specialty</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="updateQualification" class="form-control" />
                        <label class="form-label" for="qualification">Qualification</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="updateButton" type="button" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>
