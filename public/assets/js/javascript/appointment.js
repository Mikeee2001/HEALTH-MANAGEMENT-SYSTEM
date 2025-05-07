// $(document).ready(function () {
//     $('.table').DataTable({
//         ordering: true,
//         paging: true,
//         searching: true,
//         responsive: true,
//     });

//     //     // AJAX method (Asynchronous JS and XML)
//     //     $.ajax({
//     //         url: 'api/auth/display/appointment',
//     //         type: 'GET',
//     //         success: function (response) {
//     //             var users = response.users;

//     //             if (response.success) {
//     //                 console.log(users);
//     //                 var body = $('#tablebody');
//     //                 body.empty();

//     //                 for (var i = 0; i < users.length; i++) {
//     //                     var appointments = users[i].appointments;

//     //                     if (appointments && appointments.length > 0) {
//     //                         for (var j = 0; j < appointments.length; j++) {
//     //                             body.append(`
//     //                                 <tr>
//     //                                     <td>${users[i].id}</td>
//     //                                     <td>${users[i].lastname}, ${users[i].firstname}</td>
//     //                                     <td>${appointments[j].appointment_name}</td>
//     //                                     <td>${appointments[j].appointment_status.status}</td>
//     //                                 </tr>
//     //                             `);
//     //                         }
//     //                     } else {
//     //                         body.append(`
//     //                             <tr>
//     //                                 <td>${users[i].id}</td>
//     //                                 <td>${users[i].lastname}, ${users[i].firstname}</td>
//     //                                 <td>No appointments</td>
//     //                                 <td>No status</td>
//     //                             </tr>
//     //                         `);
//     //                     }
//     //                 }
//     //             }
//     //         },
//     //         error: function (xhr, status, error) {
//     //             console.error(xhr.responseText);
//     //         }
//     //     });
//     // });


//     //axios
//     // axios.get('api/auth/display/appointment')
//     // .then(function (response) {
//     //     var users = response.data.users;

//     //     if (response.data.success) {
//     //         console.log(users);
//     //         var body = $('#tablebody');
//     //         body.empty();

//     //         users.forEach(function (user) {
//     //             if (user.appointments && user.appointments.length > 0) {
//     //                 user.appointments.forEach(function (appointment) {
//     //                     body.append(`
//     //                         <tr>
//     //                             <td>${user.id}</td>
//     //                             <td>${user.lastname}, ${user.firstname}</td>
//     //                             <td>${appointment.appointment_name}</td>
//     //                             <td>${appointment.appointment_status.status}</td>
//     //                         </tr>
//     //                     `);
//     //                 });
//     //             } else {
//     //                 body.append(`
//     //                     <tr>
//     //                         <td>${user.id}</td>
//     //                         <td>${user.lastname}, ${user.firstname}</td>
//     //                         <td>No appointments</td>
//     //                         <td>No status</td>
//     //                     </tr>
//     //                 `);
//     //             }
//     //         });
//     //     }
//     // })
//     // .catch(function (error) {
//     //     console.error(error);
//     // });

//     //fetch
//     // fetch('api/auth/display/appointment')
//     //     .then(response => response.json())
//     //     .then(data => {
//     //         if (data.success) {

//     //             var user = data.users
//     //             console.log(user)
//     //             var body = $('#tablebody');
//     //             body.empty();

//     //             console.log(user.length)
//     //             let index = 0;
//     //             while (index < user.length) {
//     //                 body.append(`
//     //                  <tr>
//     //                  <td>${user[index].id}</td>
//     //                  <td>${user[index].lastname}, ${user[index].firstname}</td>

//     //                  </tr>
//     //                 `);
//     //                 index++;
//     //             }

//     //         }
//     //     }).catch(error => {
//     //         console.error('Fetch error:', error);
//     //     });

//     fetch('api/auth/display/appointments')
//     .then(response => {
//         if (!response.ok) {
//             throw new Error(`HTTP error! status: ${response.status}`);
//         }
//         return response.json();
//     })
//     .then(data => {
//         if (data.success) {
//             var users = data.users; // Extract users array
//             console.log(users);

//             var body = $('#tablebody');
//             body.empty(); // Clear the table body before populating

//             console.log(users.length); // Log the number of users

//             let index = 0;
//             while (index < users.length) {
//                 const user = users[index]; // Get the current user object

//                 // Check if the user has appointments
//                 if (user.appointments && user.appointments.length > 0) {
//                     user.appointments.forEach(appointment => {
//                         // Append rows for each appointment
//                         body.append(`
//                             <tr>
//                                 <td>${user.id}</td>
//                                 <td>${user.lastname}, ${user.firstname}</td>
//                                 <td>${appointment.appointment_name || 'No appointment name'}</td>
//                                 <td>${appointment.appointment_status?.status || 'No status available'}</td>
//                             </tr>
//                         `);
//                     });
//                 } else {
//                     // If no appointments exist for the user
//                     body.append(`
//                         <tr>
//                             <td>${user.id}</td>
//                             <td>${user.lastname}, ${user.firstname}</td>
//                             <td>No appointments</td>
//                             <td>No status</td>
//                         </tr>
//                     `);
//                 }
//                 index++;
//             }
//         }
//     })
//     .catch(error => {
//         console.error('Fetch error:', error);
//     });


// });
