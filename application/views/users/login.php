<div class="container-fluid">

	<div class="row">

		<div class="col-md-4 col-md-push-4">

			<h2>Admin Sign In</h2>

			<form name="new-message" action="/users/login" method="post">

				<div class="form-group">
					<label for="username">Username:</label>
					<div class="hint"></div>
					<input type="text" id="username" name="username" placeholder="" />
					<div class="error"></div>
				</div> <!-- End .form-group -->

				<div class="form-group">
					<label for="password">Password:</label>
					<div class="hint"></div>
					<input type="password" id="password" name="password" placeholder="" />
					<div class="error"></div>
				</div> <!-- End .form-group -->

				<div class="form-group">
					<button type="submit" class="button">Sign In</button>
				</div>

			</form> 

		</div> <!-- End .col-md-4 .col-md-push-4 -->

	</div> <!-- End .row -->

</div> <!-- End .container -->