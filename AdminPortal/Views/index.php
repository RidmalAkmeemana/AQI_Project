<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>AQI - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to Administrator dashboard</p>

                            <!-- Login Form -->
                            <form method="POST" id="login-form">
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" id="password" name="password" required>
                                </div>
                                <div id="error-message" class="text-danger"></div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>
                            <!-- /Login Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script>
        $(document).ready(function () {
            $('#login-form').submit(function (event) {
                event.preventDefault();
                $('#error-message').html('');  // Clear previous errors

                var email = $('#email').val().trim();
                var password = $('#password').val().trim();

                // Validate inputs
                if (email === "" || password === "") {
                    $('#error-message').html("<center><label class='text-danger'>Username & Password are required</label></center>");
                    return;
                }

                var formData = {
                    Email: email,
                    Password: password
                };

                console.log("Sending Request:", formData); // Debugging log

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:7023/api/auth/login', // Ensure API is running
                    contentType: 'application/json',
                    dataType: 'json',
                    data: JSON.stringify(formData),
                    success: function (response) {
                        console.log("API Response:", response); // Debugging log

                        if (response.token) {
                            localStorage.setItem('token', response.token);
                            window.location.href = 'home.php'; // Redirect to home page
                        } else {
                            $('#error-message').html("<center><label class='text-danger'>Invalid Username or Password</label></center>");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Login Error:", xhr.responseText); // Debugging log
                        var errorMessage = "Invalid Username or Password";

                        if (xhr.status === 0) {
                            errorMessage = "Cannot connect to API. Is it running?";
                        } else if (xhr.responseJSON) {
                            errorMessage = xhr.responseJSON.message || xhr.responseJSON.error || "Invalid Credentials";
                        }

                        $('#error-message').html("<center><label class='text-danger'>" + errorMessage + "</label></center>");
                    }
                });
            });
        });
    </script>

</body>
</html>
