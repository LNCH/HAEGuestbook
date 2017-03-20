<input type="hidden" id="current-page" value="<?php echo $data['page']; ?>" />

<div class="container">

	<div class="row">

		<div class="col-md-3 col-md-push-9 main-sidebar">

			<div class="sidebar-widget post-message">

				<a href="/messages/new" id="post-message" class="button full-width">Post a Message</a>

				<p>
					Feel free to leave us a short message to tell us what you think to
					our services 
				</p>

			</div> <!-- End .sidebar-widget --> 					

		</div> <!-- End .col-md-3 .main-sidebar -->

		<div class="col-md-9 col-md-pull-3">

			<main id="main-content">

				<?php 
					$messages = $data['messages'];

					foreach($messages as $message):
				?>

					<article class="message">

						<h3 class="message-author">
							Written by: <span class="author-name"><?php echo $message->author_name; ?></span> 
						</h3>

						<?php $datetime = strtotime($message->date_posted); ?>
						<span class="message-time">
							Posted: <span class="date"><?php echo gmdate("jS M, Y", $datetime); ?></span> at 
							<span class="date"><?php echo gmdate("h:ia", $datetime); ?></span>
						</span>

						<div class="message-content">
							<p><?php echo nl2br($message->message); ?></p>
						</div>

						<?php if(isset($_SESSION['user_id'])): ?>
							<div class="admin-controls">

								<a class="edit-message" title="Edit Message">
									<?php include(APP_PATH . 'includes/svg-pencil.php'); ?>
								</a>

								<a href="/messages/delete/<?php echo $message->id; ?>" class="delete-message" title="Delete Message">
									<?php include(APP_PATH . 'includes/svg-trash.php'); ?>
								</a>

							</div> <!-- End .admin-controls -->

							<form id="edit-message-<?php echo $message->id; ?>" action="/messages/edit/<?php echo $message->id; ?>" method="post">

								<div class="form-group">
									<label for="message-edit-<?php echo $message->id; ?>"></label>
									<div class="hint"></div>
									<textarea id="message-edit-<?php echo $message->id; ?>" name="message-edit" class="small"><?php echo $message->message; ?></textarea>
									<div class="error"></div>
								</div> <!-- End .form-group -->

								<div style="text-align: right;">
									<button type="submit" class="button no-margin">Edit Message</button>
									<input type="button" class="button no-margin cancel-edit grey" value="Cancel" />
								</div>

							</form>
						<?php endif; ?>

					</article> <!-- End .message -->

				<?php endforeach; ?>

				<div class="pagination">

					<?php
						$pagination = $data['pagination'];
						if($pagination)
						{
							echo $pagination->displayLinks();
						}
					?>

				</div> <!-- End .pagination -->

			</main> <!-- End #main-content -->

		</div> <!-- End .col-md-9 -->

	</div> <!-- End .row -->

</div> <!-- End .container -->