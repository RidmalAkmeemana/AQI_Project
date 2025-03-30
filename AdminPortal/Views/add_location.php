<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>AQI Project - Locations</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feathericon.min.css">

	<!-- Datatables CSS -->
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
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
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>

			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>

			<!-- Header Right Menu -->
			<ul class="nav user-menu">
				<!-- User Menu -->
				<?php require 'user_menu.php'; ?>
				<!-- /User Menu -->
			</ul>
		</div>

		<!-- Sidebar -->
		<?php require 'sidebar.php'; ?>
		<!-- /Sidebar -->

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

		<div class="modal fade" id="SaveSuccessModel" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content text-center">
					<div class="modal-body mt-4">
						<i class="fa fa-check-circle animate_animated animatetada animate_infinite"
							style="font-size: 100px; margin-top:20px; color:#1ABC9C;" aria-hidden="true"></i>
						<h3 class="modal-title"><b id="Message">Success</b></h3>
					</div>
					<div class="modal-body">
						<button style="width:20%;" type="button" class="btn btn-primary" id="OkBtn"
							data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="SaveErrorModel" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content text-center">
					<div class="modal-body mt-4">
						<i class="fa fa-exclamation-circle animate_animated animatetada animate_infinite"
							style="font-size: 100px; margin-top:20px; color:#1ABC9C;" aria-hidden="true"></i>
						<h3 class="modal-title"><b>Error Adding Location</b></h3>
						<p id="info">Error Adding Location</p>
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
		<div class="page-wrapper">
			<div class="content container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-7 col-auto">
							<h3 class="page-title">Location</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Location</li>
							</ul>
						</div>
						<div class="col-sm-5 col">
							<a href="#Add_Location" data-toggle="modal" class="btn btn-primary float-right mt-2"> <i
									class="fa fa-plus-square" aria-hidden="true"></i> Add Location</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="datatable table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Sensor Id</th>
												<th>City</th>
												<th>Status</th>
												<th>Latitude</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<!-- Data will be populated here via JS -->
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Add Modal -->
		<div class="modal fade" id="Add_Location" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Location</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="#" id="addLocationForm" enctype="multipart/form-data">
							<div class="row form-row">
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Sensor Id</label>
										<input type="text" name="sensorid" class="form-control" required="">
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>City</label>
										<input type="text" name="city" class="form-control" required="">
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Latitude</label>
										<input type="number" step="any" name="latitude" class="form-control" required="">
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Longitude</label>
										<input type="number" step="any" name="longitude" class="form-control" required="">
									</div>
								</div>
							</div>
							<button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Modal -->

		<!-- Edit Modal -->
		<div class="modal fade" id="Edit_Location" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Location</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="#" id="editLocationForm" enctype="multipart/form-data">
							<div class="row form-row">
								
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Sensor Id</label>
										<input type="text" name="editedsensorid" class="form-control" required="" disabled>
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>City</label>
										<input type="text" name="editedcity" class="form-control" required="">
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Latitude</label>
										<input type="number" step="any" name="editedlatitude" class="form-control" required="">
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Longitude</label>
										<input type="number" step="any" name="editedlongitude" class="form-control" required="">
									</div>
								</div>
							</div>
							<button type="submit" name="edit" class="btn btn-primary btn-block">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Modal -->

		<!-- Delete Modal -->
		<div class="modal fade" id="Delete_Location" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Delete Location</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="deleteLocationForm">
							<div class="row form-row">
								<div class="col-12">
									<div class="form-group">
										<h3>Are You Sure You Want To Delete This User?</h3>
										<p id="city">City</p>
									</div>
								</div>
							</div>
							<button type="button" id="confirmDelete" class="btn btn-danger btn-block">Yes</button>
							<button type="button" class="btn btn-warning btn-block" data-dismiss="modal">No</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->


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
		// Function to fetch users data from the API
		function fetchLocations() {
			$.ajax({
				type: 'GET', // The request method (same as GET in the original example)
				url: 'https://localhost:7023/api/sensors/all', // The API endpoint
				dataType: 'json', // Expecting JSON data from the API
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token') // Include token for authorization
				},
				success: function (data) {
					// Log the response data for debugging
					console.log("API Response:", data);

					// Check if data is not empty and is an array
					if (Array.isArray(data) && data.length > 0) {
						// Destroy existing DataTable, if any
						if ($.fn.dataTable.isDataTable('.datatable')) {
							$('.datatable').DataTable().destroy();
						}

						// Initialize DataTable
						var table = $('.datatable').DataTable({
							searching: true, // Enable search functionality
						});

						// Clear existing rows
						table.clear();

						// Loop through the location and add rows to the table
						$.each(data, function (index, location) {

							let rowNumber = index + 1;

							table.row.add([
								rowNumber,
								location.sensorId,         // Assuming location has 'sensorId' property
								location.city,            // Assuming location has 'city' property
								location.latitude,            // Assuming location has 'latitude' property
								location.longitude,            // Assuming location has 'longitude' property
								`<div class="status-toggle">
									<input type="checkbox" id="status_${location.id}" class="check toggle-status" data-id="${location.id}" ${location.isActive ? 'checked' : ''}>
									<label for="status_${location.id}" class="checktoggle">checkbox</label>
								</div>`,
								`<div class="actions">
								<a href="viewlocation.php?id=${location.id}&city=${location.city}&lat=${location.latitude}&lng=${location.longitude}" class="btn btn-warning btn-view">
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a>
								<button class="btn btn-info btn-edit" data-id="${location.id}" data-sensor="${location.sensorId}" data-cityname="${location.city}" data-latitude="${location.latitude}" data-longitude="${location.longitude}">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								</button>
								<button class="btn btn-danger btn-delete" data-id="${location.id}" data-city="${location.city}">
									<i class="fa fa-trash-o" aria-hidden="true"></i>
								</button>
							</div>`
							]);
						});

						// Draw the table
						table.draw();
					} else {
						console.log('No data received or data is empty.');
					}
				},
				error: function (xhr, status, error) {
					console.error('Error:', status, error);
				}
			});
		}

		// Function to check token and show the modal if necessary
		function checkTokenAndRedirect() {
			var token = localStorage.getItem('token');
			if (token) {
				console.log("Token found:", token);
			} else {
				console.log("Token not found in local storage.");
				$('#SessionTimeOut').modal('show');
				$('#OkBtn1').click(function () {
					window.location.href = 'index.php'; // Redirect to login page
				});
			}
		}

		// Function to handle new location registration
		function registerNewLocation(event) {
			event.preventDefault(); // Prevent the default form submission

			// Collect data from the form
			var sensorId = $('input[name="sensorid"]').val();
			var city = $('input[name="city"]').val();
			var longitude = $('input[name="longitude"]').val();
			var latitude = $('input[name="latitude"]').val();

			// Validate the form data
			if (!sensorId || !city || !longitude || !latitude) {
				alert('Please fill all the fields.');
				return;
			}

			// Prepare the data for the API request
			var locationData = {
				SensorId: sensorId,
				City: city,
				Longitude: longitude,
				Latitude: latitude
			};

			console.log("Sending Data to API:", locationData); // Debugging

			// Send the data to the API
			$.ajax({
				type: 'POST',
				url: 'https://localhost:7023/api/sensors/register',
				contentType: 'application/json',
				dataType: 'json',
				data: JSON.stringify(locationData), // Convert data to JSON format
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token') // If required
				},
				success: function (response) {
					console.log('New location registered:', response);

					// Show success message in modal
					$('#Message').html(response.message || "Location Added Successfully.");
					$('#SaveSuccessModel').modal('show');

					// Close Add Location modal
					$('#Add_Location').modal('hide');

					// Reset form fields
					$('#addLocationForm')[0].reset();

					// Fetch updated locations
					fetchLocations();
				},
				error: function (xhr) {
					console.error('Error:', xhr);

					// Extract error response
					var response = xhr.responseJSON;
					if (response) {
						console.log("Server Response:", response); // Log full response for debugging

						var errorMessage = "Error Adding Location.";
						if (Array.isArray(response) && response.length > 0 && response[0].description) {
							errorMessage = response[0].description;
						} else if (response.message) {
							errorMessage = response.message;
						}

						$('#Add_Location').modal('hide');
						$('#info').text(errorMessage);
					} else {
						$('#Add_Location').modal('hide');
						$('#info').text('Error Adding Location.');
					}

					// Show error modal
					$('#SaveErrorModel').modal('show');
				}
			});
		}

		$(document).on('change', '.toggle-status', function () {
			let checkbox = $(this);
			let locationId = checkbox.data('id');
			let isActive = checkbox.is(':checked'); // true if checked, false if unchecked
			let url = isActive 
				? `https://localhost:7023/api/sensors/activate/${locationId}`
				: `https://localhost:7023/api/sensors/deactivate/${locationId}`;

			console.log(`Updating status for Location ID: ${locationId}, Active: ${isActive}`);

			$.ajax({
				type: 'PUT', // Ensure this is the correct method required by your API
				url: url,
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token'),
					'Content-Type': 'application/json'
				},
				success: function (response) {
					console.log('Status updated successfully:', response);
				},
				error: function (xhr) {
					console.error('Error updating status:', xhr);
					alert('Error updating status. Please try again.');
					checkbox.prop('checked', !isActive); // Revert checkbox if the request fails
				}
			});
		});


		// Show Edit User modal and populate fields
		$(document).on('click', '.btn-edit', function () {
			var Id = $(this).data('id');
			var sensorId = $(this).data('sensor');
			var city = $(this).data('cityname');
			var lat = $(this).data('latitude');
			var lng = $(this).data('longitude');

			$('#editLocationForm input[name="editedsensorid"]').val(sensorId);
			$('#editLocationForm input[name="editedcity"]').val(city);
			$('#editLocationForm input[name="editedlatitude"]').val(lat);
			$('#editLocationForm input[name="editedlongitude"]').val(lng);
			$('#editLocationForm').attr('data-id', Id); // Store user ID in the form
			$('#Edit_Location').modal('show');
		});

		// Handle Edit User form submission
		$('#editLocationForm').submit(function (event) {
			event.preventDefault();

			var Id = $(this).attr('data-id');

			var updatedSensorId = $('input[name="editedsensorid"]').val();
			var updatedCity = $('input[name="editedcity"]').val();
			var updatedLatitude = $('input[name="editedlatitude"]').val();
			var updatedlLongitude = $('input[name="editedlongitude"]').val();

			if (!updatedSensorId || !updatedCity || !updatedLatitude || !updatedlLongitude) {
				alert('City, Latitude & Longitude cannot be empty.');
				return;
			}

			var updatedData = {
				SensorId: updatedSensorId,
				City: updatedCity,
				Longitude: updatedlLongitude,
				Latitude: updatedLatitude
			};

			$.ajax({
				type: 'PUT',
				url: `https://localhost:7023/api/sensors/update/${Id}`,
				contentType: 'application/json',
				dataType: 'json',
				data: JSON.stringify(updatedData),
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token')
				},
				success: function (response) {
					console.log('Location updated:', response.message);
					$('#Edit_Location').modal('hide');
					fetchLocations();
				},
				error: function (xhr) {
					console.error('Error updating location:', xhr);
					alert('Error updating user. Please try again.');
				}
			});
		});

		// Handle delete button click
		$(document).on('click', '.btn-delete', function () {
			var userId = $(this).data('id');
			var city = $(this).data('city'); // Fetch full name

			$('#city').text(city);
			$('#deleteLocationForm').attr('data-id', userId); // Store user ID in form data
			$('#Delete_Location').modal('show'); // Show the modal
		});

		// Handle confirmation of delete
		$('#confirmDelete').on('click', function () {
			var userId = $('#deleteLocationForm').attr('data-id'); // Retrieve stored user ID

			$.ajax({
				type: 'DELETE',
				url: `https://localhost:7023/api/sensors/${userId}`,
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token')
				},
				success: function (response) {
					console.log('Location deleted:', response.message);
					$('#Delete_Location').modal('hide'); // Close modal
					fetchLocations(); // Refresh user list
				},
				error: function (xhr) {
					console.error('Error deleting location:', xhr);
					alert('Error deleting user. Please try again.');
				}
			});
		});


		// Call both functions on window load
		window.onload = function () {
			fetchLocations();
			checkTokenAndRedirect();

			// Attach the form submit event listener
			$('#addLocationForm').submit(registerNewLocation); // Call registerNewLocation on form submission
		};

		// Optional: Check token on any click event
		window.onclick = function () {
			checkTokenAndRedirect();
		};
	</script>
</body>

</html>