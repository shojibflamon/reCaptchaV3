<!DOCTYPE html>
<html>
<head>
    <title>Google Recaptcha v3</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=6LfxK6UZAAAAAK1OetSxFMhHatpdHHOg5OI4NPHA"></script>

	<link href="style.css" rel="stylesheet">
	<script src="javascript.js"></script>
</head>
<body>
	<main class="py-4">
	
		<div class="container">
		
			<div class="card">
				<div class="card-header">
					Registration Here
				</div>
				
				<div class="card-body">
			
					<!-- Image loader -->
					<div id="loader">
						<img src="loder.gif">
					</div>
					<!-- Image loader -->
				
					<div class="row justify-content-center">
						<div class="col-6">
							<!-- Response Notification -->
							<div id="response_notification"></div>
							<!-- Response Notification -->
						</div>
					</div>
				
					<div class="row justify-content-center">
						<div class="col-6">
							
							<form method="post" id="myLoginForm">
								
								<div class="form-group">
									<label>Full Name</label>
									<input type="text" class="form-control" placeholder="Full Name" name="fullname" required>
								</div>
								
								<div class="form-group">
									<label>User Name</label>
									<input type="text" class="form-control" placeholder="User Name" name="username" required>
								</div>
								
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" placeholder="Password" name="password" required>
								</div>
								
								<input type="hidden" name="g-recaptcha-response" value="" id="g-recaptcha-response">
								<input type="submit" class="btn btn-black" value="Submit">
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
</html>