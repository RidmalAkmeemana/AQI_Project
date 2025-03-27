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
								<h3 id="adminName" class="page-title">Welcome Ridmal Akmeemana</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<!-- Page Wrapper -->
						<div class="row" id="dashboardData">
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dash-widget-header">
                                            <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                                            <div class="dash-count">
                                                <h3>2</h3>
                                            </div>
                                        </div>
                                        <div class="dash-widget-info">
                                            <h6 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</h6>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary w-100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dash-widget-header">
                                            <i class="fa fa-location-arrow fa-2x" aria-hidden="true"></i>
                                            <div class="dash-count">
                                                <h3>4</h3>
                                            </div>
                                        </div>
                                        <div class="dash-widget-info">
                                            <h6 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Locations</h6>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary w-100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dash-widget-header">
                                            <i class="fa fa-id-badge fa-2x"></i>
                                            <div class="dash-count">
                                                <h3>${data.instructorCount}</h3>
                                            </div>
                                        </div>
                                        <div class="dash-widget-info">
                                            <h6 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students</h6>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary w-100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

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
		
		<script src="assets/plugins/raphael/raphael.min.js"></script>    
		<script src="assets/plugins/morris/morris.min.js"></script>  
		<script src="assets/js/chart.morris.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>

<script>
    $(document).ready(function () {
        // Fetch dashboard data
        $.ajax({
            type: 'GET',
            url: '../../API/Admin/getDashboardData.php',
            dataType: 'json',
            success: function (data) {
                // Update dashboard counts
                $('#dashboardData').html(`
                <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <i class="fa fa-graduation-cap fa-2x"></i>
                                    <div class="dash-count">
                                        <h3>${data.studentCount}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students</h6>
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
                                    <i class="fa fa-bookmark fa-2x"></i>
                                    <div class="dash-count">
                                        <h3>${data.degreeCount}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students</h6>
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
                                    <i class="fa fa-id-badge fa-2x"></i>
                                    <div class="dash-count">
                                        <h3>${data.instructorCount}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students</h6>
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
                                    <i class="fa fa-book fa-2x"></i>
                                    <div class="dash-count">
                                        <h3>${data.moduleCount}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            },
            error: function (xhr, status, error) {
                console.error('Error:', status, error);
            }
        });

        // Fetch student attendance graph data
        fetch('../../API/Admin/studentAtendanceGraph.php')
            .then(response => response.json())
            .then(data => {
                // Convert date strings to Date objects
                const trueData = data.filter(item => item.ispresent === 'true').map(item => ({ ...item, date: new Date(item.date) }));
                const falseData = data.filter(item => item.ispresent === 'false').map(item => ({ ...item, date: new Date(item.date) }));

                // Extract labels and counts for each dataset
                const trueLabels = trueData.map(item => item.date);
                const trueCounts = trueData.map(item => item.count);
                const falseLabels = falseData.map(item => item.date);
                const falseCounts = falseData.map(item => item.count);

                // Render attendance chart
                var ctx = document.getElementById('attendanceChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: trueLabels,
                        datasets: [
                            {
                                label: 'Present',
                                data: trueCounts,
                                backgroundColor: 'rgba(26, 188, 156)',
                                borderColor: 'rgba(26, 188, 156)',
                                borderWidth: 1
                            },
                            {
                                label: 'Absent',
                                data: falseCounts,
                                backgroundColor: 'rgba(0, 0, 0)',
                                borderColor: 'rgba(0, 0, 0)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day'
                                },
                                title: {
                                    display: true,
                                    text: 'Date'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Count'
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    });
</script>
		
    </body>
</html>