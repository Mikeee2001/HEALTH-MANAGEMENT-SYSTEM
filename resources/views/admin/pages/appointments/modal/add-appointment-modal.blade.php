<!-- Doctor Modal -->
<div class="modal makeNewAppointment" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Appointment</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">


                <!-- Appointment Name -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="userSelect">Enter Appointment Name</label>
                    <select id="userSelect" class="form-select">
                        <option value="userSelect" selected disabled>Select a User</option>
                        <!-- Users will be loaded dynamically -->
                    </select>
                </div>

                <!-- Appointment Date -->
                <div class="form-outline mb-3">
                    <label class="form-label text-right"  for="appointmentDate">Enter Appointment Date</label>
                    <input type="datetime-local"  id="appointmentDate" class="form-control" min=""/>
                </div>


                <!-- Appointment Type -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="appointmentType">Enter Appointment Type</label>
                    <select id="appointmentType" class="form-select">
                        <option value="" selected disabled>Select an Appointment Type</option>
                        <option value="checkup">Checkup</option>
                        <option value="emergency">Emergency</option>
                        <option value="follow-up">Follow-up</option>
                        <option value="consult">Consult</option>
                    </select>
                </div>

                <!-- Assign Doctor -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="doctorSelect">Assign Doctor</label>
                    <select id="doctorSelect" class="form-select">
                        <option value="" selected disabled>Select a Doctor</option>
                        <!-- Doctors will be loaded dynamically -->
                    </select>
                </div>

                <!-- Appointment Status -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="statusSelect">Select Status</label>
                    <select id="statusSelect" class="form-select">
                        <option value="" selected disabled>Select a Status</option>
                        <option value="pending">Pending</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="canceled">Canceled</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="saveAppointment" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
</div>
