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
                       <a class="btn btn-warning btn-lg mx-1 editUserBtn" type="button"><i class="fa-solid fa-user-pen custom-icon"></i></a>
                        <a class="btn btn-danger btn-lg " type="button"><i class="fas fa-trash custom-icon"></i></a>
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
            displayUsers(); // ✅ REFRESH THE TABLE
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
            console.log("Edit User button clicked!"); // Debugging statement
            $('.editUserModal').modal('show').removeAttr('aria-hidden');

        });

});




    function closeModal() {
        $('.addUserModal').modal('hide').removeAttr('aria-hidden');
        $('.viewUserModal').modal('hide').removeAttr('aria-hidden');

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

