
$(document).ready(function () {

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


    const displayDoctors = () => {
        axios.get('/api/auth/display/doctors')
            .then(function (response) {
                var doctors = response.data.doctors;
                // const table = $('.doctorsTable').DataTable()

                if (response.data.success) {
                    console.log(doctors);


                    table.clear();


                    doctors.forEach(function (item, index) {
                        table.row.add([
                            `<div class="align-middle text-center">${index + 1}</div>`,
                            `<div><img src="/storage/${item.doctor_image}" class="img-fluid img-thumbnail doctor-img text-center" alt="Doctor Image" style="width: 100px; height: 100px;"></div>`,
                            `<div>${item.firstname}</div>`,
                            `<div>${item.lastname}</div>`,
                            `<div>${item.specialty}</div>`,
                            `<div>${item.qualification}</div>`,
                            `<div class="d-flex gap-3 custom-buttons">
                                <a class="btn btn-info btn-lg"
                                onclick="viewDoctor('${item.firstname}', '${item.lastname}', '${item.specialty}', '${item.qualification}')"
                                type="button">
                                <i class="fas fa-eye custom-icon"></i>
                                </a>
                                <a class="btn btn-warning btn-lg editButton mx-1" data-id="${item.id}" type="button"><i class="fas fa-edit custom-icon"></i></a>
                                <a class="btn btn-danger btn-lg deleteButton" data-id="${item.id}" type="button"><i class="fas fa-trash custom-icon"></i></a>
                             </div>`
                        ]);
                    });


                    table.draw(false);
                }
            })
            .catch(function (error) {
                console.error('Error fetching doctors:', error.message);
                toastr.error("Failed to fetch doctors. Please try again.");
            });
    }


    displayDoctors();


    $('.btnAddDoctor').on('click', function () {
        $('#addDoctorModal').modal('show').removeAttr('aria-hidden');
    });



    $('#saveButton').on('click', function () {
        var fnameValue = fname.val().trim();
        var lnameValue = lname.val().trim();
        var specialtyValue = specialty.val().trim();
        var qualificationValue = qualification.val().trim();
        var doctorImageValue = $('#doctor_image')[0].files[0]; // Image file

        // Validation check for empty fields
        if (!fnameValue || !lnameValue || !specialtyValue || !qualificationValue || !doctorImageValue) {
            toastr.error("Please fill in all the fields before submitting.");
            return; // Prevent submission if any field is empty
        }

        var formData = new FormData();
        formData.append('firstname', fnameValue);
        formData.append('lastname', lnameValue);
        formData.append('specialty', specialtyValue);
        formData.append('qualification', qualificationValue);
        formData.append('doctor_image', doctorImageValue);

        axios.post('/api/auth/add-doctor', formData, {
            headers: { 'Content-Type': 'multipart/form-data' }
        }).then((response) => {
            console.log("Doctor saved successfully:", response);

            $('#addDoctorModal').modal('hide'); //CLOSE THE MODAL

            displayDoctors(); // ✅ REFRESH THE TABLE
            toastr.success("Doctor added successfully!");

            // Clear the form fields
            fname.val("");
            lname.val("");
            specialty.val("");
            qualification.val("");
            $('#doctor_image').val("");
        }).catch((error) => {
            console.error("Error adding doctor:", error);
            toastr.error("Error adding doctor! Please try again.");
        });
    });


    $(document).on('click', '.editButton', function () {
        var doctorId = $(this).data('id'); // Get doctor ID

        // Fetch doctor data by ID
        axios.get(`/api/auth/get-doctor/${doctorId}`)
            .then(function (response) {
                var doctor = response.data.doctor;

                if (response.data.success) {
                    // Populate modal fields with fetched data
                    $('#updateFirstname').val(doctor.firstname);
                    $('#updateLastname').val(doctor.lastname);
                    $('#updateSpecialty').val(doctor.specialty);
                    $('#updateQualification').val(doctor.qualification);

                    // If image exists, display the current image in the modal
                    if (doctor.doctor_image) {
                        $('#currentDoctorImage').attr('src', `/storage/doctor_image/${doctor.doctor_image}`);
                    } else {
                        $('#currentDoctorImage').attr('src', ''); // Clear image if none exists
                    }

                    // Show modal
                    $('.editDoctorModal').modal('show').removeAttr('aria-hidden');

                    $('#updateButton').off('click').on('click', function () {
                        var formData = new FormData();
                        formData.append('firstname', $('#updateFirstname').val().trim());
                        formData.append('lastname', $('#updateLastname').val().trim());
                        formData.append('specialty', $('#updateSpecialty').val().trim());
                        formData.append('qualification', $('#updateQualification').val().trim());

                        // Append image if uploaded
                        var fileInput = $('#updateDoctor_image')[0].files[0];
                        if (fileInput) {
                            formData.append('doctor_image', fileInput);
                        }

                        // Send update request with the form data
                        axios.post(`/api/auth/update-doctor/${doctorId}`, formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                            },
                        })
                            .then(() => {
                                // console.log("Update success! Refreshing table...");

                                $('.editDoctorModal').modal('hide');

                                displayDoctors(); // Refresh doctor list
                                toastr.success("Doctor updated successfully!");

                            })

                            .catch(() => {
                                toastr.error("Failed to update the doctor. Please try again.");
                            });
                    });
                } else {
                    toastr.error("Failed to fetch doctor data.");
                }
            })
            .catch(function (error) {
                console.error('Error fetching doctor data:', error.message);
                toastr.error("Failed to fetch doctor data. Please try again.");
            });
    });



    $(document).on('click', '.deleteButton', function () {
        var doctorId = $(this).data('id'); // Get doctor ID from the clicked button

        // Confirm deletion
        if (confirm('Are you sure you want to delete this doctor?')) {
            // Send DELETE request to the backend
            axios.delete(`/api/auth/delete-doctor/${doctorId}`)
                .then(function (response) {
                    if (response.data.success) {
                        displayDoctors(); // Refresh the table with updated data
                        toastr.success("Doctor deleted successfully!");
                    } else {
                        toastr.error(response.data.message || "Failed to delete doctor.");
                    }
                })
                .catch(function (error) {
                    console.error("Error deleting doctor:", error.message);
                    toastr.error("Failed to delete doctor. Please try again.");
                });
        }
    });




})

function closeModal() {
    $('#addDoctorModal').modal('hide').removeAttr('aria-hidden');
    $('.editDoctorModal').modal('hide').removeAttr('aria-hidden');
    $('.viewDoctorModal').modal('hide').removeAttr('aria-hidden');
}

function viewDoctor( firstname, lastname, specialty, qualification) {

    doctor_image = doctor_image || "N/A";
    firstname = firstname || "N/A";
    lastname = lastname || "N/A";
    specialty = specialty || "N/A";
    qualification = qualification || "N/A";

    if ( !firstname || !lastname || !specialty || !qualification) {
        console.error("Some details are missing:");
        console.error("firstname:", firstname);
        console.error("lastname:", lastname);
        console.error("specialty:", specialty);
        console.error("qualification:", qualification);

        alert("Error: Missing doctor details. Please check the data.");
        return;
    }

    // Populate modal fields
    $('#viewDoctorImage').val(doctor_image);
    $('#viewFirstname').val(firstname);
    $('#viewLastname').val(lastname);
    $('#viewSpecialty').val(specialty);
    $('#viewQualification').val(qualification);

    // Show the modal
    $('.viewDoctorModal').modal('show').removeAttr('aria-hidden');
}










