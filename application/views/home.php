<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>


</head>
<body>

	<form method="POST">
		<input type="text" name = "address" placeholder="enter ronnin address">
		<input type="submit" value = "submit">
	</form>

	<form method="POST">
		<input type="hidden" name = "logout" value = "true">
		<input type="submit" value = "log-out">
	</form>
	<ul>
		<?php foreach ($scholars as $scholar):?>
			<li><?php echo $scholar['leaderboard']['name'] . " - " .
			 $scholar['slp']['todaySoFar'] . " - " . 
			 $scholar['slp']['yesterdaySLP'] . " - " .
			 $scholar['slp']['average'];?></li>
		<?php endforeach;?>
	</ul>
</body>
</html>