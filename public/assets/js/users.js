            $(document).ready(function () {
                // Initialize DataTable with options
                var table = $('.usersTable').DataTable({
                    ordering: true,
                    paging: true,
                    searching: true,
                    responsive: true
                });



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


            const displayUsers = () => {
                axios.get('/api/auth/display/users')
                .then(function (response) {
                    console.log("API Response:", response.data); // Debugging
                    var user = response.data.users;

                    if (response.data.success) {
                        console.log(user);


                        table.clear();


                        user.forEach(function (item, index) {
                            table.row.add([
                                `<div class="align-middle text-center" >${index + 1}</div>`,
                                `<div>${item.username}</div>`,
                                `<div>${item.firstname}</div>`,
                                `<div>${item.lastname}</div>`,
                                `<div>${item.email}</div>`,
                                `<div>${new Date(item.created_at).toLocaleDateString()}</div>`,
                                `<div class="d-flex justify-content-around custom-buttons">
                                    <a class="btn btn-info btn-lg"
                                    onclick="viewUsers('${item.username}', '${item.firstname}', '${item.lastname}', '${item.email}','${new Date(item.created_at).toLocaleDateString()}')"
                                    type="button"><i class="fas fa-eye custom-icon"></i></a>
                                <a class="btn btn-warning btn-lg mx-1 editUserBtn" data-id="${item.id}" type="button"><i class="fa-solid fa-user-pen custom-icon"></i></a>
                                    <a class="btn btn-danger btn-lg deleteUserBtn" data-id="${item.id}" type="button"><i class="fas fa-trash custom-icon"></i></a>
                                </div>`
                            ]);
                        });


                        table.draw(false);
                    }
                })
                .catch(function (error) {
                    console.error("Error fetching users:", error.message);
                    toastr.error("Failed to fetch users. Please try again.");
                });

            }


            displayUsers();

            //SAVE USER BUTTON
            $('.btnAddUser').on('click', function () {
                $('.addUserModal').modal('show').removeAttr('aria-hidden');



                $('#saveUserButton').on('click', function () {
                    var userUsername = $('#addUsername').val().trim();
                    var userFirstname = $('#addUserfirstname').val().trim();
                    var userLastname = $('#addUserlastname').val().trim();
                    var userEmail = $('#addUserEmail').val().trim();
                    var userPassword = $('#addUserPassword').val().trim();


                    // Validation check for empty fields
                if (!userUsername || !userFirstname || !userLastname || !userEmail || !userPassword) {
                        toastr.error("Please fill in all the fields before submitting.");
                        return;
                    }


                    var formData = new FormData();
                    formData.append('username', userUsername);
                    formData.append('firstname', userFirstname);
                    formData.append('lastname', userLastname);
                    formData.append('email', userEmail);
                    formData.append('password', userPassword);



                    axios.post('/api/auth/register-users', formData, {
                        headers: { 'Content-Type': 'multipart/form-data' }
                    }).then((response) => {
                        console.log("User saved successfully:", response);
                        closeModal(); //CLOSE THE MODAL
                        displayUsers(); //  REFRESH THE TABLE
                        toastr.success("User added successfully!");

                        // Clear the form fields
                        $('#addUsername').val("");
                        $('#addUserfirstname').val("");
                        $('#addUserlastname').val("");
                        $('#addUserEmail').val("");
                        $('#addUserPassword').val("");

                    }).catch((error) => {
                        console.error("Error adding user:", error);

                        if (error.response && error.response.data && error.response.data.message === "User email already exists. Please choose a different email.") {
                            toastr.error(error.response.data.message);
                        }
                    });


                }); // END OF USER SAVE BUTTON


            });
      // START OF EDIT USER BUTTON
      $(document).on('click', '.editUserBtn', function () {
        // console.log("Edit User button clicked!");

            var userID = $(this).data('id');

            // Debugging: Ensure userID is valid before making request
            if (!userID) {
                console.error("Error: userID is undefined. Cannot fetch user data.");
                return; // Stop execution if userID is invalid
            }

            //console.log("Fetching user data for ID:", userID);

            axios.get(`/api/auth/get-user/${userID}`)
                .then(function (response) {
                    var user = response.data.user;

                    // if (response.data.success) {
                    //     console.log("User data fetched successfully:", user);
                    // } else {
                    //     console.warn("Failed to fetch user data.");
                    //     return;
                    // }

                    //  FIXED: Matching correct form field IDs
                    $('#updateUsername').val(user.username);
                    $('#updateUserFirstname').val(user.firstname);
                    $('#updateUserLastname').val(user.lastname);
                    $('#updateUserEmail').val(user.email);

                    $('.editUserModal').modal('show').removeAttr('aria-hidden');

                    //  Save Changes Button
                    $('#saveEditUser').off('click').on('click', function () {
                        var updatedData = {
                            username: $('#updateUsername').val().trim(),
                            firstname: $('#updateUserFirstname').val().trim(),
                            lastname: $('#updateUserLastname').val().trim(),
                            email: $('#updateUserEmail').val().trim()
                        };

                        //  Password should only be updated if provided
                        var newPassword = $('#updateUserPassword').val().trim();
                        if (newPassword) {
                            updatedData.password = newPassword;
                        }

                        axios.put(`/api/auth/update-user/${userID}`, updatedData)
                            .then(function (response) {
                                if (response.data.success) {
                                    console.log("User updated successfully!", response.data);
                                    $('.editUserModal').modal('hide');
                                    displayUsers(); // Refresh the table
                                    toastr.success("User details updated successfully!");
                                } else {
                                    toastr.error("Failed to update user.");
                                }
                            })
                            .catch(function (error) {
                                console.error("Error updating user:", error.message);
                                toastr.error("Error updating user. Please try again.");
                            });
                    });

                })
                .catch(function (error) {
                    console.error("Error fetching user data:", error.message);
                    toastr.error("Failed to fetch user details.");
                });
        });


    $(document).on('click', '.deleteUserBtn', function () {
        var userID = $(this).data('id'); // Get doctor ID from the clicked button

        // Confirm deletion
        if (confirm('Are you sure you want to delete this user?')) {
            // Send DELETE request to the backend
            axios.delete(`/api/auth/delete-user/${userID}`)
                .then(function (response) {
                    if (response.data.success) {
                        displayUsers(); // Refresh the table with updated data
                        toastr.success("User deleted successfully!");
                    } else {
                        toastr.error(response.data.message || "Failed to delete User.");
                    }
                })
                .catch(function (error) {
                    console.error("Error deleting User:", error.message);
                    toastr.error("Failed to delete User. Please try again.");
                });
        }
    });

 }); //END OF DOCUMENT READY




                function closeModal() {
                    $('.addUserModal').modal('hide').removeAttr('aria-hidden');
                    $('.viewUserModal').modal('hide').removeAttr('aria-hidden');
                    $('.editUserModal').modal('hide').removeAttr('aria-hidden');

                }

                function viewUsers(username, firstname, lastname, email, createdAt) {
                    // console.log(`Viewing User: ${username} ${firstname} ${lastname} (${email})`);


                        // Populate modal fields
                        $('#viewUsername').val(username);
                        $('#viewUserfirstname').val(firstname);
                        $('#viewUserlastname').val(lastname);
                        $('#viewUserEmail').val(email);
                        $('#viewUserCreated').val(createdAt);
                        // Show the modal
                        $('.viewUserModal').modal('show').removeAttr('aria-hidden');
                    }

