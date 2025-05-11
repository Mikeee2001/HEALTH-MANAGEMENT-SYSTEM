<div class="modal fade editAppointment" id="editStatusModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Appointment Status</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editStatusForm">
                    <input type="hidden" id="appointmentID">
                    <label for="appointmentStatus">Select Status:</label>
                    <select class="form-control" id="appointmentStatus">
                        <option value="pending">Pending</option>
                        <option value="completed">Confirmed</option>>
                        <option value="failed">Canceled</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="saveStatusChanges">Save</button>
            </div>
        </div>
    </div>
</div>
