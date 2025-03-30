<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>AQI Project - Users</title>

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
						<h3 class="modal-title"><b>Error Adding User</b></h3>
						<p id="info">Error Adding User</p>
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
							<h3 class="page-title">Users</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Users</li>
							</ul>
						</div>
						<div class="col-sm-5 col">
							<a href="#Add_User" data-toggle="modal" class="btn btn-primary float-right mt-2"><i
									class="fa fa-plus-square" aria-hidden="true"></i> Add Users</a>
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
												<th>Name of Users</th>
												<th>Email</th>
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
		<div class="modal fade" id="Add_User" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="#" id="addUserForm" enctype="multipart/form-data">
							<div class="row form-row">
								<div class="col-12 col-sm-12">
									<div class="form-group">
										<label>Full Name</label>
										<input type="text" name="fullname" class="form-control" required="">
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" required="">
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" required="">
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
		<div class="modal fade" id="Edit_User" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="#" id="editUserForm" enctype="multipart/form-data">
							<div class="row form-row">
								<div class="col-12 col-sm-12">
									<div class="form-group">
										<label>Full Name</label>
										<input type="text" name="editedfullname" class="form-control" required="">
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
		<div class="modal fade" id="Delete_User" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Delete User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="deleteUserForm">
							<div class="row form-row">
								<div class="col-12">
									<div class="form-group">
										<h3>Are You Sure You Want To Delete This User?</h3>
										<p id="name">Full Name</p>
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
		function fetchUsers() {
			$.ajax({
				type: 'GET', // The request method (same as GET in the original example)
				url: 'https://localhost:7023/api/user', // The API endpoint
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

						// Loop through the users and add rows to the table
						$.each(data, function (index, user) {

							let rowNumber = index + 1;

							table.row.add([
								rowNumber,
								user.fullName,         // Assuming user has 'fullName' property
								user.email,            // Assuming user has 'email' property
								`<div class="actions">
								<button class="btn btn-info btn-edit" data-id="${user.id}" data-fullname="${user.fullName}">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								</button>
								<button class="btn btn-danger btn-delete" data-id="${user.id}" data-fullname="${user.fullName}">
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

		// Function to handle new user registration
		function registerNewUser(event) {
			event.preventDefault(); // Prevent the default form submission

			// Collect data from the form
			var fullName = $('input[name="fullname"]').val();
			var email = $('input[name="email"]').val();
			var password = $('input[name="password"]').val();

			// Validate the form data
			if (!fullName || !email || !password) {
				alert('Please fill all the fields.');
				return;
			}

			// Prepare the data for the API request
			var userData = {
				FullName: fullName,
				Email: email,
				Password: password
			};

			// Send the data to the API
			$.ajax({
				type: 'POST',
				url: 'https://localhost:7023/api/auth/register',
				contentType: 'application/json',
				dataType: 'json',
				data: JSON.stringify(userData), // Convert data to JSON format
				success: function (response) {
					console.log('New user registered:', response.message);

					// Show success message in modal
					$('#Message').html(response.message);
					$('#SaveSuccessModel').modal('show');

					// Close Add User modal
					$('#Add_User').modal('hide');

					// After the "OK" button is clicked, fetch users and show success message
					$('#OkBtn1').click(function () {
						$('#SaveSuccessModel').modal('hide'); // Hide success modal
					});
					fetchUsers();
					$('input[name="fullname"]').val('');
					$('input[name="email"]').val('');
					$('input[name="password"]').val('');
				},
				error: function (xhr) {
					console.error('Error:', xhr);

					// Extract error response
					var response = xhr.responseJSON;
					if (response && Array.isArray(response) && response.length > 0) {
						var firstErrorMessage = response[0].description;
						$('#info').text(firstErrorMessage);
					} else {
						$('#info').text('Error Adding User.');
					}

					// Close Add User modal
					$('#Add_User').modal('hide');
					$('#SaveErrorModel').modal('show');

					fetchUsers();
				}
			});
		}

		// Show Edit User modal and populate fields
		$(document).on('click', '.btn-edit', function () {
			var userId = $(this).data('id');
			var fullName = $(this).data('fullname');

			$('#editUserForm input[name="editedfullname"]').val(fullName);
			$('#editUserForm').attr('data-id', userId); // Store user ID in the form
			$('#Edit_User').modal('show');
		});

		// Handle Edit User form submission
		$('#editUserForm').submit(function (event) {
			event.preventDefault();

			var userId = $(this).attr('data-id');
			var updatedFullName = $('input[name="editedfullname"]').val();

			if (!updatedFullName) {
				alert('Full Name cannot be empty.');
				return;
			}

			var updatedData = {
				FullName: updatedFullName
			};

			$.ajax({
				type: 'PUT',
				url: `https://localhost:7023/api/user/${userId}`,
				contentType: 'application/json',
				dataType: 'json',
				data: JSON.stringify(updatedData),
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token')
				},
				success: function (response) {
					console.log('User updated:', response.message);
					$('#Edit_User').modal('hide');
					fetchUsers();
				},
				error: function (xhr) {
					console.error('Error updating user:', xhr);
					alert('Error updating user. Please try again.');
				}
			});
		});

		// Handle delete button click
		$(document).on('click', '.btn-delete', function () {
			var userId = $(this).data('id');
			var fullName = $(this).data('fullname'); // Fetch full name

			$('#name').text(fullName);
			$('#deleteUserForm').attr('data-id', userId); // Store user ID in form data
			$('#Delete_User').modal('show'); // Show the modal
		});

		// Handle confirmation of delete
		$('#confirmDelete').on('click', function () {
			var userId = $('#deleteUserForm').attr('data-id'); // Retrieve stored user ID

			$.ajax({
				type: 'DELETE',
				url: `https://localhost:7023/api/user/${userId}`,
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token')
				},
				success: function (response) {
					console.log('User deleted:', response.message);
					$('#Delete_User').modal('hide'); // Close modal
					fetchUsers(); // Refresh user list
				},
				error: function (xhr) {
					console.error('Error deleting user:', xhr);
					alert('Error deleting user. Please try again.');
				}
			});
		});


		// Call both functions on window load
		window.onload = function () {
			fetchUsers();
			checkTokenAndRedirect();

			// Attach the form submit event listener
			$('#addUserForm').submit(registerNewUser); // Call registerNewUser on form submission
		};

		// Optional: Check token on any click event
		window.onclick = function () {
			checkTokenAndRedirect();
		};
	</script>
</body>

</html>