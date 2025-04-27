$(document).ready(function () {
    // Initialize DataTable
    var table = $('.doctorsTable').DataTable({
        ordering: true,
        paging: true,
        searching: true,
        responsive: true,
    });

    var fname = $('#firstname');
    var lname = $('#lastname');
    var specialty = $('#specialty');
    var qualification = $('#qualification');

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // Function to fetch and display doctors data
    function displayDoctors() {
        axios.get('/api/auth/displayData')
            .then(function (response) {
                var doctors = response.data.doctors;

                if (response.data.success) {
                    console.log(doctors);

                    // Clear the table body
                    table.clear();

                    // Add rows to the DataTable dynamically
                    doctors.forEach(function (item, index) {
                        table.row.add([
                            `<div>${index + 1}</div>`,
                            `<div>${item.firstname}</div>`,
                            `<div>${item.lastname}</div>`,
                            `<div>${item.specialty}</div>`,
                            `<div>${item.qualification}</div>`,
                            `<div class="d-flex justify-content-around custom-buttons">
                            <a class="btn btn-info btn-sm" type="button">View</a>
                            <a class="btn btn-warning btn-sm editButton mx-1" data-id="${item.id}" type="button">Edit</a>
                            <a class="btn btn-danger btn-sm deleteButton" data-id="${item.id}" type="button">Delete</a>
                        </div>`
                        ]);
                    });

                    // Redraw the table after adding rows
                    table.draw(false);
                }
            })
            .catch(function (error) {
                console.error('Error fetching doctors:', error.message);
                toastr.error("Failed to fetch doctors. Please try again.");
            });
    }

    // Call the displayDoctors function
    displayDoctors();

    // Event listener for the "Add Doctor" button
    $('.btnAddDoctor').on('click', function () {
        $('.doctorModal').modal('show')
    });

    // Function to close modal
    function closeModal() {
        $('.doctorModal').modal('hide');
    }

    $('#saveButton').on('click', function () {
        if (fname.val().trim() === "" || lname.val().trim() === ""
            || specialty.val().trim() === "" || qualification.val().trim() === "") {
            toastr.warning("Please fill all the fields!");
            return;
        }

        axios.post('/api/auth/add-doctor', {
            firstname: fname.val().trim(),
            lastname: lname.val().trim(),
            specialty: specialty.val().trim(),
            qualification: qualification.val().trim(),
        }).then((response) => {
            console.log(response);
            closeModal();
            displayDoctors();
            toastr.success("Doctor added successfully!");
            // Reset form fields
            fname.val("");
            lname.val("");
            specialty.val("");
            qualification.val("");
        }).catch((error) => {
            console.error(error);
            toastr.error("Error adding doctor! Please try again.");
        });
    });


    $(document).on('click', '.deleteButton', function () {
        var doctorId = $(this).data('id'); // Get doctor ID

        if (confirm('Are you sure you want to delete this doctor?')) {
            axios.delete(`/api/auth/delete-doctor/${doctorId}`)
                .then(() => {
                    toastr.success("Doctor deleted successfully!");
                    displayDoctors(); // Refresh table data
                })
                .catch(() => {
                    toastr.error("Failed to delete the doctor. Please try again.");
                });
        }
    });

    $(document).on('click', '.editButton', function () {
        var doctorId = $(this).data('id'); // Get doctor ID

        // Fetch doctor data by ID
        axios.get(`/api/auth/display/doctor/${doctorId}`)
            .then(function (response) {
                var doctor = response.data.doctor;

                if (response.data.success) {
                    // Populate modal fields with fetched data
                    fname.val(doctor.firstname);
                    lname.val(doctor.lastname);
                    specialty.val(doctor.specialty);
                    qualification.val(doctor.qualification);

                    // Show modal
                    $('.doctorModal').modal('show');

                    $('#saveButton').off('click').on('click', function () {
                        axios.put(`/api/auth/edit-doctor/${doctorId}`, {
                            firstname: fname.val().trim(),
                            lastname: lname.val().trim(),
                            specialty: specialty.val().trim(),
                            qualification: qualification.val().trim(),
                        }).then(() => {
                            console.log("Update success! Refreshing table...");
                            $('.doctorModal').modal('hide');
                            displayDoctors();
                            table.draw(false); // Force redraw
                            toastr.success("Doctor updated successfully!");
                        }).catch(() => {
                            toastr.error("Failed to update the doctor. Please try again.");
                        });
                    });

                }
            })
            .catch(function (error) {
                console.error('Error fetching doctor data:', error.message);
                toastr.error("Failed to fetch doctor data. Please try again.");
            });
    });


    // Attach the closeModal function to the close button in the modal
    $('.btn-secondary[data-dismiss="modal"]').on('click', closeModal);
});
