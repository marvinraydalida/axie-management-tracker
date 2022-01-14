<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<title>Register</title>
	<link rel="stylesheet" href="<?php echo base_url() . "assets/css/register.css" ?>">

</head>

<body>
	<div class="form-container">
		<form method="POST">
			<div class="register-input">
				<?php if (empty(form_error('email'))) : ?>
					<input type="text" name="email" placeholder="email">
				<?php else : ?>
					<input type="text" name="email" placeholder="email" class="error-border">
				<?php endif; ?>

				<div class="name">
					<?php if (empty(form_error('first_name'))) : ?>
						<input type="text" name="first_name" placeholder="First name">
					<?php else : ?>
						<input type="text" name="first_name" placeholder="First name" class="error-border">
					<?php endif; ?>

					<?php if (empty(form_error('last_name'))) : ?>
						<input type="text" name="last_name" placeholder="Last name">
					<?php else : ?>
						<input type="text" name="last_name" placeholder="Last name" class="error-border">
					<?php endif; ?>
				</div>
				<?php if (empty(form_error('password'))) : ?>
					<input type="password" name="password" placeholder="password">
				<?php else : ?>
					<input type="text" name="password" placeholder="Password" class="error-border">
				<?php endif; ?>

				<?php if (empty(form_error('cpassword'))) : ?>
					<input type="password" name="cpassword" placeholder="Confirm password">
				<?php else : ?>
					<input type="text" name="cpassword" placeholder="Confirm password" class="error-border">
				<?php endif; ?>
			</div>
			<div class="register-button">
				<input type="submit" value="submit">
			</div>
		</form>
	</div>
	<?php if (!empty(validation_errors())) : ?>
		<div class="error">
			<?php echo validation_errors(); ?>
		</div>
	<?php endif; ?>

</body>

</html>