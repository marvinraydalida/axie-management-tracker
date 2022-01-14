<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<!-- CSS only -->


</head>

<body>

	<!--<form method="POST">
		<input type="text" name="email" placeholder="email">
		<input type="password" name="password" placeholder="password">
		<input type="submit" value="submit">
	</form>-->

	<!--<form method="POST">
		<fieldset>
			<legend>Login</legend>
			<div>
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" name="email"placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			<div class="form-group mt-4">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</fieldset>
	</form>-->
	<img src="<?php echo base_url()."assets/image/The Lunacian _ Axie Infinity _ Substack.png"?>" alt="">
	<div class="form-container">
		<form method="POST">
		<?php //echo form_open('Login');?>
			<div class="login-input">
				<input type="text" name = "email" placeholder="Email" autocomplete="off">
				<input type="password" name = "password" placeholder="Password">
			</div>
			<div class="login-button">
				<input type="submit" name="login" value="LOG - IN">
			</div>
			<div class="register-button">
				<p>Not registered yet?<a href="Register"> Signup now</a></p>
			</div>
			<?php echo form_error('password', '<div class="error">', '</div>'); ?>
			<?php echo form_error('email', '<div class="error">', '</div>'); ?>
		</form>
	</div>
</body>

</html>