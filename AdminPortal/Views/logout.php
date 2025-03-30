<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>AQI - Login Out</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Loader Styles */
        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
    <script>
        // Clear local storage
        localStorage.removeItem("token");

        // Prevent Back Button Access
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };

        // Redirect to index.php after a short delay
        setTimeout(() => {
            window.location.href = "index.php";
        }, 1500);

        window.onload = function () {
            var token = localStorage.getItem('token');
            if (token) {
                console.log("Token found:", token);
                // Uncomment the line below to redirect to home page if token exists
                //window.location.href = 'home.php'; // Redirect to home page
            } else {
                console.log("Clear Token");
            }
        };
    </script>
</head>
<body>
    <div class="loader"></div>
</body>
</html>
