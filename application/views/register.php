<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<title>Register</title>
	<link rel="stylesheet" href="<?php echo base_url() . "assets/css/register.css" ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">

</head>

<body>
<h1 id="login"><a href="Login"><i class="bi bi-arrow-left"></i> LOG IN</a></h1>
	<div class="form-container">
		<?php echo form_open(); ?>
		<!-- <form method="POST"> -->
			<div class="register-input">
				<div class="input-container">
					<?php if (empty(form_error('email'))) : ?>
						<input type="text" name="email" placeholder="email">
					<?php else : ?>
						<input type="text" name="email" placeholder="email" class="error-border">
						<span><?php echo form_error('email'); ?></span>
					<?php endif; ?>
				</div>

				<div class="name">
					<?php if (empty(form_error('first_name'))) : ?>
						<input type="text" name="first_name" placeholder="First name">
					<?php else : ?>
						<input type="text" name="first_name" placeholder="First name" class="error-border">
						<span><?php echo form_error('first_name') . form_error('last_name'); ?></span>
					<?php endif; ?>

					<?php if (empty(form_error('last_name'))) : ?>
						<input type="text" name="last_name" placeholder="Last name">
					<?php else : ?>
						<input type="text" name="last_name" placeholder="Last name" class="error-border">
						<span><?php echo form_error('first_name') . form_error('last_name'); ?></span>
					<?php endif; ?>
				</div>
				<div class="input-container">
					<?php if (empty(form_error('password'))) : ?>
						<input type="password" name="password" placeholder="password">
					<?php else : ?>
						<input type="password" name="password" placeholder="Password" class="error-border">
						<span><?php echo form_error('password'); ?></span>
					<?php endif; ?>

				</div>
				<div class="input-container">
					<?php if (empty(form_error('cpassword'))) : ?>
						<input type="password" name="cpassword" placeholder="Confirm password">
					<?php else : ?>
						<input type="password" name="cpassword" placeholder="Confirm password" class="error-border">
						<span><?php echo form_error('cpassword'); ?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="register-button">
				<input type="submit" value="REGISTER">
			</div>
		</form>
	</div>
</body>

</html>