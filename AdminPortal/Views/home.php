<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>AQI Project - Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>

    <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="home.php" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>
                <a href="home.php" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">

                <!-- User Menu -->
                <?php
                require 'user_menu.php';
                ?>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <?php
        require 'sidebar.php';
        ?>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 id="adminName" class="page-title">Welcome</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- /Model Alerts -->
                <div class="modal fade" id="SessionTimeOut" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center">
                            <div class="modal-body mt-4">
                                <i class="fa fa-exclamation-circle animate_animated animatetada animate_infinite"
                                    style="font-size: 100px; margin-top:20px; color:#1ABC9C;" aria-hidden="true"></i>
                                <h3 class="modal-title"><b>Session Timeout</b></h3>
                            </div>
                            <div class="modal-body">
                                <button style="width:20%;" type="button" class="btn btn-primary" id="OkBtn1"
                                    data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Model Alerts -->

                <!-- Page Wrapper -->
                <div class="row" id="dashboardData">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <i class="fa fa-users fa-2x text-info" aria-hidden="true"></i>
                                    <div class="dash-count">
                                        <h3 id="userCount">0</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-xs font-weight-bold text-uppercase mb-1">Registed Users</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <i class="fa fa-location-arrow fa-2x text-warning" aria-hidden="true"></i>
                                    <div class="dash-count">
                                        <h3 id="locationCount">0</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-xs font-weight-bold text-uppercase mb-1">Locations</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <i class="fa fa-check-circle fa-2x text-primary" aria-hidden="true"></i>
                                    <div class="dash-count">
                                        <h3 id="activeSensors">0</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-xs font-weight-bold text-uppercase mb-1">Active Sensors</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <i class="fa fa-times-circle fa-2x text-danger" aria-hidden="true"></i>
                                    <div class="dash-count">
                                        <h3 id="inactiveSensors">0</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-xs font-weight-bold text-uppercase mb-1">Inactive Sensors</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="col-md-12 text-center">
                        <div id="map" style="width:100%; height:400px;"></div>
                    </div>
                    <!-- Map -->

                    <!-- Create a canvas for the chart -->
                    <canvas id="attendanceChart" width="100" height="30"></canvas>
                    <!-- /Page Wrapper -->

                </div>
                <!-- /Main Wrapper -->

                <!-- jQuery -->
                <script src="assets/js/jquery-3.2.1.min.js"></script>

                <!-- Bootstrap Core JS -->
                <script src="assets/js/popper.min.js"></script>
                <script src="assets/js/bootstrap.min.js"></script>

                <!-- Slimscroll JS -->
                <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

                <!-- Datatables JS -->
                <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="assets/plugins/datatables/datatables.min.js"></script>

                <!-- Custom JS -->
                <script src="assets/js/script.js"></script>

                <script>
                    // Global map variable to keep reference to the map instance
                    var map;
                    var markers = {}; // Object to store markers by location ID
                    var infoWindows = {}; // Object to store InfoWindows by location ID

                    // Function to check token and show the modal if necessary
                    function checkTokenAndRedirect() {
                        var token = localStorage.getItem('token');
                        if (token) {
                            console.log("Token found:", token);

                            // Fetch the list of users from the API
                            fetch('https://localhost:7023/api/user', {
                                method: 'GET',
                                headers: {
                                    'Authorization': 'Bearer ' + token,
                                    'Content-Type': 'application/json'
                                }
                            })
                                .then(response => response.json())
                                .then(data => {
                                    console.log("API Response:", data);
                                    document.getElementById('userCount').innerText = data.length;
                                })
                                .catch(error => {
                                    console.error('Error fetching users:', error);
                                });

                            // Fetch the list of locations and update location counts
                            fetch('https://localhost:7023/api/sensors/all', {
                                method: 'GET',
                                headers: {
                                    'Authorization': 'Bearer ' + token,
                                    'Content-Type': 'application/json'
                                }
                            })
                                .then(response => response.json())
                                .then(data => {
                                    console.log("Location API Response:", data);
                                    document.getElementById('locationCount').innerText = data.length;

                                    const activeLocations = data.filter(location => location.isActive);
                                    document.getElementById('activeSensors').innerText = activeLocations.length;
                                    document.getElementById('inactiveSensors').innerText = data.length - activeLocations.length;
                                })
                                .catch(error => {
                                    console.error('Error fetching locations:', error);
                                });

                        } else {
                            console.log("Token not found in local storage.");
                            $('#SessionTimeOut').modal('show');
                            $('#OkBtn1').click(function () {
                                window.location.href = 'index.php';
                            });
                        }
                    }

                    // Function to initialize the map and place markers
                    function initMap() {
                        var token = localStorage.getItem('token');
                        if (token) {
                            fetch('https://localhost:7023/api/sensors/all', {
                                method: 'GET',
                                headers: {
                                    'Authorization': 'Bearer ' + token,
                                    'Content-Type': 'application/json'
                                }
                            })
                                .then(response => response.json())
                                .then(data => {
                                    console.log("Location API Response:", data);
                                    const activeLocations = data.filter(location => location.isActive);

                                    if (!map) {
                                        map = new google.maps.Map(document.getElementById('map'), {
                                            center: { lat: 6.9271, lng: 79.8612 },
                                            zoom: 10
                                        });
                                    }

                                    activeLocations.forEach(location => {
                                        updateMarker(location, token);
                                    });
                                })
                                .catch(error => {
                                    console.error('Error fetching locations:', error);
                                });
                        }
                    }

                    // Function to update marker and info window dynamically
                    function updateMarker(location, token) {
                        fetch(`https://localhost:7023/api/aqireadings/sensor/${location.id}`, {
                            method: 'GET',
                            headers: {
                                'Authorization': 'Bearer ' + token,
                                'Content-Type': 'application/json'
                            }
                        })
                            .then(response => response.json())
                            .then(aqiData => {
                                console.log("AQI Data:", aqiData);
                                const latestAQI = aqiData.length > 0 ? aqiData[0].aqiValue : 0;
                                let color = 'green';
                                let aqiLevelText = "Good";
                                let badgeClass = "badge badge-primary";

                                if (latestAQI > 50 && latestAQI <= 100) {
                                    color = 'blue';
                                    aqiLevelText = "Moderate";
                                    badgeClass = "badge badge-info";
                                } else if (latestAQI > 100 && latestAQI <= 150) {
                                    color = 'orange';
                                    aqiLevelText = "Unhealthy for Sensitive Groups";
                                    badgeClass = "badge badge-warning";
                                } else if (latestAQI > 150 && latestAQI <= 200) {
                                    color = 'red';
                                    aqiLevelText = "Unhealthy";
                                    badgeClass = "badge badge-danger";
                                } else if (latestAQI > 200) {
                                    color = 'purple';
                                    aqiLevelText = "Very Unhealthy";
                                    badgeClass = "badge badge-dark";
                                }

                                if (markers[location.id]) {
                                    // Update marker color dynamically
                                    markers[location.id].setIcon({
                                        path: google.maps.SymbolPath.CIRCLE,
                                        scale: 8,
                                        fillColor: color,
                                        fillOpacity: 0.8,
                                        strokeColor: 'white',
                                        strokeWeight: 2
                                    });

                                    // Update InfoWindow content dynamically
                                    infoWindows[location.id].setContent(`
                <h5 class="text-uppercase"><span class="${badgeClass}">${latestAQI}</span> ${location.city}</h5>
                <p><strong>AQI Level:</strong> <span class="${badgeClass}"> ${aqiLevelText}</span></p>
                <a href="viewlocation.php?id=${location.id}&city=${location.city}&lat=${location.latitude}&lng=${location.longitude}" class="btn btn-outline-secondary btn-sm mt-2"><strong>MORE INFOMATION</strong></a>
            `);
                                } else {
                                    // Create a new marker if it doesn't exist
                                    const marker = new google.maps.Marker({
                                        position: { lat: location.latitude, lng: location.longitude },
                                        map: map,
                                        title: location.city,
                                        icon: {
                                            path: google.maps.SymbolPath.CIRCLE,
                                            scale: 8,
                                            fillColor: color,
                                            fillOpacity: 0.8,
                                            strokeColor: 'white',
                                            strokeWeight: 2
                                        }
                                    });

                                    // Create a new InfoWindow
                                    const infoWindow = new google.maps.InfoWindow({
                                        content: `
                                        <h5 class="text-uppercase"><span class="${badgeClass}">${latestAQI}</span> ${location.city}</h5>
                                        <p><strong>AQI Level:</strong> <span class="${badgeClass}"> ${aqiLevelText}</span></p>
                                        <a href="viewlocation.php?id=${location.id}&city=${location.city}&lat=${location.latitude}&lng=${location.longitude}" style="color:black;"><strong>More Information</strong></a>`
                                    });

                                    marker.addListener('click', function () {
                                        infoWindow.open(map, marker);
                                    });

                                    // Store the marker and InfoWindow in the global objects
                                    markers[location.id] = marker;
                                    infoWindows[location.id] = infoWindow;
                                }
                            })
                            .catch(error => {
                                console.error('Error fetching AQI data:', error);
                            });
                    }

                    // Call the function on window load
                    window.onload = function () {
                        checkTokenAndRedirect();
                        initMap();
                        setInterval(initMap, 1000); // Refresh AQI data every 1 seconds without recreating markers
                    };

                    // Optionally, trigger the same function when clicking anywhere on the window
                    window.onclick = function () {
                        checkTokenAndRedirect();
                    };

                </script>


                <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzn3Dbtgv_oV5GaSrF0fDcjRiL9ckCDp8&callback=myMap"></script>

</body>

</html>