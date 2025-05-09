$(document).ready(function () {
    // Initialize DataTable
    var table = $('.usersAppointmentsTable').DataTable({
        ordering: true,
        paging: true,
        searching: true,
        responsive: true,
    });

    // ✅ Function to display user appointments
    function displayUserAppointment() {
        axios.get('/api/auth/book-appointments')
            .then(response => {
                var users = response.data.users;
                if (response.data.success) {
                    console.log("Users fetched:", users);
                    table.clear();

                    users.forEach((user, index) => {
                        user.appointments.forEach(appointment => {
                            let doctorText = appointment.doctor
                                ? `${appointment.doctor.firstname} ${appointment.doctor.lastname}`
                                : "No Doctor Assigned";

                            let statusText = appointment.appointmentStatus
                                ? appointment.appointmentStatus.status
                                : "Pending";

                            // Format Date & Time
                            let [date, timeRaw] = appointment.date_time.split('T');
                            let [hours, minutes] = timeRaw.split(':');
                            let period = hours >= 12 ? "PM" : "AM";
                            let formattedTime = `${hours % 12 || 12}:${minutes} ${period}`;

                            // Add appointment row to table
                             table.row.add([
                            `<div class="align-middle text-center">${index + 1}</div>`,
                            `<div class="align-middle text-center">${user.firstname} ${user.lastname}</div>`,
                            `<div class="align-middle text-center">${date}</div>`,
                            `<div class="align-middle text-center">${formattedTime}</div>`,
                            `<div class="align-middle text-center">${appointment.appointment_type}</div>`,
                            `<div class="align-middle text-center">${doctorText}</div>`,
                            `<div class="align-middle text-center">${statusText}</div>`,
                            `<div class="d-flex gap-3 custom-buttons">
                                <a class="btn btn-info btn-lg" onclick="viewUserAppointments()" type="button">
                                    <i class="fas fa-eye custom-icon"></i>
                                </a>
                                <a class="btn btn-warning btn-lg mx-1 " type="button"><i class="fas fa-edit custom-icon"></i></a>
                                <a class="btn btn-danger btn-lg deleteAppointmentBtn" data-id="${appointment.id}" type="button">
                                        <i class="fas fa-trash custom-icon"></i>
                                </a>

                            </div>`
                            ]);
                        });
                    });

                    table.draw(false);
                }
            })
            .catch(error => console.error("Error fetching appointments:", error.message));
    }

    displayUserAppointment();



    // ✅ Fetch available doctors on appointment date selection
    $("#appointmentDate").on("change", function () {
        const appointmentDateTime = $(this).val();
        if (!appointmentDateTime) {
            console.error("No appointment date selected!");
            return;
        }

        console.log("Selected appointment date:", appointmentDateTime);

        axios.get('/api/auth/get-available-doctors', { params: { appointment_date: appointmentDateTime } })
            .then(response => {
                console.log("Available Doctors Response:", response.data.available_doctors);

                const doctorSelect = $("#doctorSelect");
                doctorSelect.empty().append(`<option value="" selected disabled>Select a Doctor</option>`);

                const availableDoctors = response.data.available_doctors;

                if (availableDoctors.length === 0) {
                    doctorSelect.append(`<option value="" disabled>No available doctors</option>`);
                } else {
                    availableDoctors.forEach(doctor => {
                        doctorSelect.append(`
                            <option value="${doctor.id}">
                                🩺 Dr. ${doctor.firstname} ${doctor.lastname} | ${doctor.specialty} | ${doctor.qualification}
                            </option>
                        `);
                    });
                }
            })
            .catch(error => console.error("Error fetching available doctors:", error));
    });

    // ✅ Ensure appointment date is always valid (today or future)


    setDateLimits();

     // ✅ Fetch users dynamically before opening modal
    // $('#addAppointment').on('click', function () {
    //     fetchUsers(); // Load users before showing modal
    //     $('.makeNewAppointment').modal('show').removeAttr('aria-hidden');
    // });

    // ✅ Function to fetch users dynamically


    // ✅ Save appointment with selected user
    // $('#saveAppointment').on('click', function () {
    //     var addUserSelect = $('#userSelect').val();
    //     var addAppointmentDate = $('#appointmentDate').val();
    //     var addAppointmentType = $('#appointmentType').val();
    //     var addDoctorSelect = $('#doctorSelect').val();
    //     var addStatusSelect = $('#statusSelect').val();

    //     const allowedAppointmentTypes = ["checkup", "emergency", "follow-up", "consult"];

    //     console.log("Debugging Values:");
    //     console.log("Selected User ID:", addUserSelect);
    //     console.log("Appointment Date:", addAppointmentDate);
    //     console.log("Appointment Type:", addAppointmentType);
    //     console.log("Doctor:", addDoctorSelect);
    //     console.log("Status:", addStatusSelect);

    //     if (!addUserSelect || !addAppointmentDate || !addAppointmentType || !addDoctorSelect || !addStatusSelect) {
    //         toastr.error("Please fill in all the fields before submitting.");
    //         return;
    //     }

    //     if (!allowedAppointmentTypes.includes(addAppointmentType)) {
    //         toastr.error("Invalid appointment type! Please select a valid option.");
    //         return;

    //     }


    //     // ✅ Prepare the Data
    //     let appointmentData = {
    //         appointment_name: `Appointment for ${addUserSelect}`,
    //         appointment_date: addAppointmentDate,
    //         allowedAppointmentTypes: ["checkup", "emergency", "follow-up", "consult"],
    //         doctor_id: addDoctorSelect,
    //         status: addStatusSelect,
    //         user_id: addUserSelect // ✅ Correct user selection
    //     };

    //     console.log("Appointment Data being sent:", appointmentData);

    //     // ✅ Send the Request
    //     axios.post('/api/auth/store-appointment', appointmentData, {

    //     })
    //     .then(response => {
    //         console.log("Appointment Created Successfully:", response.data);
    //         toastr.success("Appointment booked successfully!");
    //         displayUserAppointment();
    //         closeModal();
    //     })
    //     .catch(error => {
    //         console.error("Error creating appointment:", error.response.data);
    //         toastr.error("Failed to book appointment. Please try again.");
    //     });


    // });

    $(document).on("click", ".deleteAppointmentBtn", function () {
        var appointmentID = $(this).data("id"); // ✅ Get appointment ID

        console.log("Appointment ID to delete:", appointmentID); // ✅ Debugging step

        if (!appointmentID) {
            toastr.error("Invalid appointment ID.");
            return;
        }

        if (confirm("Are you sure you want to delete this Appointment?")) {
            axios.delete(`/api/auth/delete-appointment/${appointmentID}`)
                .then(function (response) {
                    if (response.data.success) {

                        toastr.success("Appointment deleted successfully!");
                         displayUserAppointment();
                         table.draw(false); 
                    } else {
                        toastr.error(response.data.message || "Failed to delete Appointment.");
                    }
                })
                .catch(function (error) {
                    console.error("Error deleting Appointment:", error.message);
                    toastr.error("Failed to delete Appointment. Please try again.");
                });
        }
    });
});

// ✅ Function to close modal
function closeModal() {
    $('.makeNewAppointment').modal('hide').removeAttr('aria-hidden');
}

function setDateLimits() {
    let today = new Date();
    today.setHours(8, 0, 0, 0);

    let maxTime = new Date();
    maxTime.setHours(20, 0, 0, 0);


    let formattedToday = today.toISOString().split("T")[0];

    $("#appointmentDate").attr("min", formattedToday);


    $("#appointmentTime").on("change", function () {
        let selectedTime = $(this).val();
        let [hours, minutes] = selectedTime.split(":").map(Number);

        if (hours < 8 || hours > 20) {
            toastr.error("Invalid time! Please select a time between 8:00 AM and 8:00 PM.");
            $(this).val("");
        }


    });


}


function fetchUsers() {
    axios.get('/api/auth/display/users')
        .then(response => {
            console.log("Users API Response:", response.data);

            let users = response.data.users || response.data; // Ensure correct format
            let userSelect = $("#userSelect");

            userSelect.empty();
            userSelect.append('<option value="" selected disabled>Select a User</option>');

            if (!Array.isArray(users)) {
                console.error("Users data is not an array:", users);
                toastr.error("Invalid data format received.");
                return;
            }

            users.forEach(user => {
                userSelect.append(`<option value="${user.id}">${user.firstname} ${user.lastname}</option>`);
            });
        })
        .catch(error => {
            console.error("Error fetching users:", error);
            toastr.error("Failed to retrieve users.");
        });
}

