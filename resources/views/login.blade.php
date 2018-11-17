<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login Form</title>

		<!-- Bootstrap -->
		<link src="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<h1>Login Form</h1>
			<form method="POST" action="{{url('admin/login')}}">
				@csrf
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" value=""/>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" value=""/>
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Login</button>
				</div>
			</form>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	</body>
</html>