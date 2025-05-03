<div class="modal  viewDoctorModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Doctor Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
            </div>
            <div class="modal-body">

                {{-- <div class="form-outline mb-3 text-center">
                    <img id="viewDoctorImage" class="img-fluid img-thumbnail" alt="Doctor Image" style="width: 150px; height: 150px;" />
                </div> --}}

                <div class="form-outline mb-3">
                    <input type="text" id="viewFirstname" class="form-control" readonly />
                    <label class="form-label" for="viewFirstname">Firstname</label>
                </div>

                <div class="form-outline mb-3">
                    <input type="text" id="viewLastname" class="form-control" readonly />
                    <label class="form-label" for="viewLastname">Lastname</label>
                </div>

                <div class="form-outline mb-3">
                    <input type="text" id="viewSpecialty" class="form-control" readonly />
                    <label class="form-label" for="viewSpecialty">Specialty</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="text" id="viewQualification" class="form-control" readonly />
                    <label class="form-label" for="viewQualification">Qualification</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
</div>
