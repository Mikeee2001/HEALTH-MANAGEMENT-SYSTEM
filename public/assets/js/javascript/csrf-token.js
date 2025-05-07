axios.get('/sanctum/csrf-cookie').then(() => {
    axios.post('/login', {
        email: $('#email').val(),
        password: $('#password').val(),
    }, {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // ✅ Ensure CSRF token is sent
        },
        withCredentials: true // ✅ Ensure Laravel receives session cookies
    })
    .then(response => {
        console.log("Login successful:", response.data);
    })
    .catch(error => {
        console.error("Login failed:", error.response.data);
    });
});
