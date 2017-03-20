<!DOCTYPE html>
<html lang="en">

	<head>
	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>HAE Group Guestbook</title>

		<link rel="stylesheet" type="text/css" href="/public/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/public/css/bootstrapxl.css" />

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">

		<link rel="stylesheet/less" type="text/css" href="/public/css/core.less" />
	
	</head>
	
	<body>

		<div class="page-wrap">

			<header id="main-header">

				<div class="container">

					<div class="row">

						<div class="col-md-12">

							<a href="/" class="header-logo">
								<img src="/public/images/header-logo.png" alt="HAE Group Guestbook" data-enhanced="/public/images/header-logo.svg" class="svg-enhancement" />
							</a>

						</div>

					</div> <!-- End .row -->

				</div> <!-- End .container -->

			</header> <!-- End #main-header -->

			<?php echo $content; ?>

		</div> <!-- End .page-wrap -->

		<footer class="top-footer">

			<div class="container">

				<div class="row">

					<div class="col-md-12 footer-image">

						<?php include(APP_PATH . 'includes/svg-logo.php'); ?>

						<span class="admin-login">
							<?php if(isset($_SESSION['user_id'])): ?>
								<a href="/users/logout">Logout</a>
							<?php else: ?>
								<a href="/users/login">Admin Login</a>
							<?php endif; ?>
						</span>

					</div> <!-- End .col-md-12 -->

				</div> <!-- End .row -->

			</div> <!-- End .container -->

		</footer> <!-- End .top-footer -->

		<div id="modal-overlay">
			<div id="modal">
				<a href="#0" class="modal-close"></a>
				<div class="modal-content"></div>
			</div>
		</div>

		<a href="#0" class="cd-top">Top</a>

		<script src="/public/js/modernizr-custom.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="/public/js/less.min.js"></script>
		<script src="/public/js/velocity.js"></script>
		<script src="/public/js/core.js"></script>
		<script src="/public/js/messages.js"></script>

	</body>

</html>