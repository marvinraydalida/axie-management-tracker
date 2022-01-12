	<?php echo validation_errors(); ?>
	<!--<form method="POST">
		<input type="text" name="email" placeholder="email">
		<input type="password" name="password" placeholder="password">
		<input type="submit" value="submit">
	</form>-->

	<form method="POST" class="container w-25 mt-5">
		<fieldset>
			<legend>Login</legend>
			<div class="form-group">
				<label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
				<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1" class="form-label mt-4">Password</label>
				<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			<div class="form-group mt-4">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</fieldset>
	</form>