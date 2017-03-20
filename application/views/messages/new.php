<div class="container-fluid">

	<div class="row">

		<div class="col-md-12">

			<h2>Post a new message</h2>

			<form name="new-message" action="/messages/new" method="post" class="ajax">

				<div class="form-group">
					<label for="message-author">Your name:</label>
					<div class="hint"></div>
					<input type="text" id="message-author" name="message-author" placeholder="e.g. Susie Jones" />
					<div class="error"></div>
				</div> <!-- End .form-group -->

				<div class="form-group">
					<label for="message-content">What would you like to say?</label>
					<div class="hint"></div>
					<textarea id="message-content" name="message-content"></textarea>
					<div class="error"></div>
				</div> <!-- End .form-group -->

				<div class="form-group right">
					<button type="submit" class="button">Post Message</button>
				</div>

			</form> 

		</div> <!-- End .col-md-12 -->

	</div> <!-- End .row -->

</div> <!-- End .container -->