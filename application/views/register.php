<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>


</head>
<body>
    <?php echo validation_errors(); ?>
	<form method="POST">
		<input type="text" name = "email" placeholder="email"> <br>
        <input type="text" name = "first_name" placeholder="name"> <br>
        <input type="text" name = "last_name" placeholder="last_name"> <br>
        <input type="password" name = "password" placeholder="password"> <br>
        <input type="password" name = "cpassword" placeholder="confirm password"> <br>
		<input type="submit" value = "submit">
	</form>

</body>
</html>