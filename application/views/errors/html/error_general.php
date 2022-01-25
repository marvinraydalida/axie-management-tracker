<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Error</title>
	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: white;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		h1{
			text-align: center;
			color: black;
		}

		div{
			margin: auto;
		}

		img{
			display: block;
			margin: auto;
		}
		
	</style>
</head>

<body>
	<div id="container">
		
		<img src="https://c.tenor.com/iBE4eFqWpvsAAAAC/dead-axie-riveramor.gif" alt="">
		<h1><?php echo $heading; ?></h1>
		<h1><?php echo $message; ?></h1>
	</div>
</body>

</html>