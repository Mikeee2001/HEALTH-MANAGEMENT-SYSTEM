$(document).ready(function () {
    // Initialize DataTable
     $('.table').DataTable({
        ordering: true,
        paging: true,
        searching: true,
        responsive: true,
    });

    // AJAX function to fetch and display doctors
    $.ajax({
        url: 'api/auth/display/users',
        type: 'GET',
        success: function(response)
        {
            console.log(response)
        },
        error: function(xhr,status,error)
        {
            console.error(xhr.responseText)
        }
    })
});
