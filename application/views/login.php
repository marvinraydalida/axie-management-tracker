<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
	<!-- CSS only -->


</head>

<body>
	<img src="<?php echo base_url() . "assets/image/The Lunacian _ Axie Infinity _ Substack.png" ?>" alt="">
	<div class="form-container">
		<?php echo form_open(); ?>
		<!-- <form method="POST"> -->
		<?php //echo form_open('Login');
		?>
		<div class="login-input">
			<input type="text" name="email" placeholder="Email" autocomplete="off">
			<input type="password" name="password" placeholder="Password">
		</div>
		<div class="login-button">
			<input type="submit" name="login" value="LOG - IN">
		</div>
		<div class="register-button">
			<p>Not registered yet?<a href="Register"> Sign up now</a></p>
		</div>
		<?php echo form_error('password', '<div class="error">', '</div>'); ?>
		<?php echo form_error('email', '<div class="error">', '</div>'); ?>
		</form>
	</div>
</body>

</html>