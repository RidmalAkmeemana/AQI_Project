<?php

$id = $_REQUEST["id"];
$city = $_REQUEST["city"];
$lat = $_REQUEST["lat"];
$lng = $_REQUEST["lng"];

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>AQI Project - View Location</title>

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

    <style>
        .background-container {
            background-size: cover;
            background-position: center;
            height: 250px;
            /* Adjust the height as needed */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .tag-cloud {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 5px;
            background-color: #1ABC9C;
            color: #ffff;
            margin-top: 8px;
            width: 100%;
        }

        .tag-cloud-sub {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 5px;
            background-color: #023F85;
            color: #ffff;
            margin-top: 8px;
            width: 100%;
        }

        .datatable {
            table-layout: fixed;
            width: 100%;
            /* Ensure it takes full width */
            margin-left: auto;
            margin-right: auto;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
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
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-5 col">
                            <a href="add_location.php" class="btn float-left mt-2"> <i class="fa fa-arrow-circle-left"
                                    aria-hidden="true"></i> Go Back</a>
                        </div>
                    </div>
                </div>
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
                <div class="row" id="aqiData">
                    <div class="col-xl-12 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <h6 class="text-xs font-weight-bold text-uppercase fa-2x">AQI</h6>
                                    <div class="dash-count">
                                        <h3 id="aqi"></h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-xs font-weight-bold text-uppercase mb-1"><?php echo $city ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input style="display:none;" type="text" name="id" id="city-id" class="form-control" required=""
                    disabled value="<?php echo $id ?>">
                <input style="display:none;" type="text" name="city" class="form-control" required="" disabled
                    value="<?php echo $city ?>">
                <input style="display:none;" type="text" name="lat" class="form-control" required="" disabled
                    value="<?php echo $lat ?>">
                <input style="display:none;" type="text" name="lng" class="form-control" required="" disabled
                    value="<?php echo $lng ?>">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="col-md-12 text-center">
                        <div id="map" style="width:100%; height:400px;"></div>
                    </div>

                    <div class="col-md-12 text-left mt-4">
                        <h5 class="page-title">
                            <h5 class="tag-cloud text-xs font-weight-bold mb-1">History Details</h5>
                        </h5>
                        <br><br>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Record Id</th>
                                                    <th>Sensor Id</th>
                                                    <th>AQI Value</th>
                                                    <th>Date & Time</th>
                                                </tr>
                                            </thead>

                                            <tbody id="historyList">
                                                <!-- Data will be populated here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        // Function to check token and show the modal if necessary
                        function checkTokenAndRedirect() {
                            var token = localStorage.getItem('token');
                            if (!token) {
                                $('#SessionTimeOut').modal('show');
                                $('#OkBtn1').click(() => window.location.href = 'index.php');
                                return false;
                            }
                            return true;
                        }

                        // Function to initialize the Google Map
                        var map;
                        function initMap(lat, lng) {
                            map = new google.maps.Map(document.getElementById("map"), {
                                zoom: 10,
                                center: { lat: lat, lng: lng }
                            });
                        }

                        // Function to fetch AQI Data and populate table, as well as pin on the map
                        function fetchAQIData() {
                            if (!checkTokenAndRedirect()) return; // Ensure token is valid before proceeding

                            const sensorId = document.getElementById("city-id").value;
                            const token = localStorage.getItem("token");
                            const city = "<?php echo $_REQUEST['city']; ?>";  // PHP Variable for City
                            const lat = parseFloat("<?php echo $_REQUEST['lat']; ?>");  // PHP Variable for Latitude
                            const lng = parseFloat("<?php echo $_REQUEST['lng']; ?>");  // PHP Variable for Longitude

                            if (!sensorId) {
                                console.error("Sensor ID is missing or invalid.");
                                return;
                            }

                            if (!token) {
                                console.error("Authorization token is missing.");
                                return;
                            }

                            const apiUrl = `https://localhost:7023/api/aqireadings/sensor/${sensorId}`;
                            console.log("Fetching AQI data from:", apiUrl);

                            $.ajax({
                                type: "GET",
                                url: apiUrl,
                                dataType: "json",
                                headers: {
                                    "Authorization": `Bearer ${token}`
                                },
                                success: function (data) {
                                    console.log("API Response:", data);

                                    if (Array.isArray(data) && data.length > 0) {
                                        // Destroy existing DataTable, if any
                                        if ($.fn.dataTable.isDataTable('.datatable')) {
                                            $('.datatable').DataTable().destroy();
                                        }

                                        // Initialize DataTable
                                        var table = $('.datatable').DataTable({
                                            searching: true
                                        });

                                        table.clear();

                                        $.each(data, function (index, reading) {
                                            let rowNumber = index + 1;
                                            let timestamp = new Date(reading.readingTime);
                                            let formattedTimestamp = timestamp.toISOString().slice(0, 19);
                                            table.row.add([rowNumber, reading.id, reading.sensorId, reading.aqiValue, formattedTimestamp]);
                                        });

                                        table.draw();

                                        // Add a marker to the map based on latitude and longitude
                                        var marker = new google.maps.Marker({
                                            position: { lat: lat, lng: lng },
                                            map: map,
                                        });

                                        // Change marker color based on AQI
                                        var latestAQI = data[0].aqiValue;
                                        var markerColor;
                                        var aqiLevelText;

                                        if (latestAQI <= 50) {
                                            markerColor = 'green';
                                            aqiLevelText = "Good";
                                            badgeClass = "badge badge-primary";
                                        } else if (latestAQI <= 100) {
                                            markerColor = 'blue';
                                            aqiLevelText = "Moderate";
                                            badgeClass = "badge badge-info";
                                        } else if (latestAQI <= 150) {
                                            markerColor = 'orange';
                                            aqiLevelText = "Unhealthy for Sensitive Groups";
                                            badgeClass = "badge badge-warning";
                                        } else if (latestAQI <= 200) {
                                            markerColor = 'red';
                                            aqiLevelText = "Unhealthy";
                                            badgeClass = "badge badge-danger";
                                        } else {
                                            markerColor = 'purple';
                                            aqiLevelText = "Very Unhealthy";
                                            badgeClass = "badge badge-dark";
                                        }

                                        // Set the pin color dynamically
                                        marker.setIcon(`http://maps.google.com/mapfiles/ms/icons/${markerColor}-dot.png`);

                                        // Add event listener to show city name, AQI level and timestamp on click
                                        google.maps.event.addListener(marker, 'click', function () {
                                            var infoWindow = new google.maps.InfoWindow({
                                                content: `<h5 class="text-uppercase"><span class="${badgeClass}">${latestAQI}</span> ${city}</h5>
                                                <p><strong>AQI Level:</strong> <span class="${badgeClass}"> ${aqiLevelText}</span></p>
                                                <p><strong>Date:</strong> ${data[0].readingTime}</p>`
                                            });
                                            infoWindow.open(map, marker);
                                        });

                                    } else {
                                        console.warn("No AQI data available for this sensor.");
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error("Error fetching AQI data:", status, error);
                                }
                            });
                        }

                        // Function to update AQI section
                        function updateAQI() {
                            if (!checkTokenAndRedirect()) return; // Ensure token is valid before proceeding

                            const sensorId = document.getElementById("city-id").value;
                            const token = localStorage.getItem("token");

                            if (!sensorId) {
                                console.error("Sensor ID is missing or invalid.");
                                return;
                            }

                            if (!token) {
                                console.error("Authorization token is missing.");
                                return;
                            }

                            const apiUrl = `https://localhost:7023/api/aqireadings/sensor/${sensorId}`;
                            console.log("Fetching AQI data from:", apiUrl);

                            fetch(apiUrl, {
                                method: "GET",
                                headers: {
                                    "Accept": "application/json",
                                    "Authorization": `Bearer ${token}`
                                }
                            })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error(`API responded with status: ${response.status}`);
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    console.log("API Response:", data);

                                    if (!data || data.length === 0) {
                                        console.warn("No AQI data available for this sensor.");
                                        document.getElementById("aqi").textContent = "N/A";
                                        return;
                                    }

                                    const latestAQI = data[0].aqiValue;
                                    const aqiElement = document.getElementById("aqi");
                                    const aqiCard = document.getElementById("aqiData").querySelector(".card");

                                    aqiElement.textContent = latestAQI;

                                    if (latestAQI <= 50) {
                                        aqiCard.className = "card bg-primary text-white";
                                    } else if (latestAQI <= 100) {
                                        aqiCard.className = "card bg-info text-white";
                                    } else if (latestAQI <= 150) {
                                        aqiCard.className = "card bg-warning text-dark";
                                    } else if (latestAQI <= 200) {
                                        aqiCard.className = "card bg-danger text-white";
                                    } else {
                                        aqiCard.className = "card bg-dark text-white";
                                    }
                                })
                                .catch(error => console.error("Error fetching AQI data:", error));
                        }

                        // Set an interval to refresh the AQI and table every 2 seconds (2000ms)
                        setInterval(() => {
                            fetchAQIData();
                            updateAQI();
                        }, 1000); // Update every 2 seconds

                        // Initialize Google Map (use your own Google Maps API key)
                        function loadMap() {
                            const cityLat = parseFloat("<?php echo $_REQUEST['lat']; ?>");
                            const cityLng = parseFloat("<?php echo $_REQUEST['lng']; ?>");
                            initMap(cityLat, cityLng);
                        }

                        // Ensure the map is loaded after DOM is ready
                        window.onload = function () {
                            loadMap();
                            checkTokenAndRedirect();
                        };

                        window.onclick = function () {
                            checkTokenAndRedirect();
                        };
                    </script>

                    <!-- Google Maps API -->
                    <script
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzn3Dbtgv_oV5GaSrF0fDcjRiL9ckCDp8&callback=myMap"></script>

</body>

</html>