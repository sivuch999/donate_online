<?php include('db/DB_session_Check.php'); ?>
<html>
	<?php include("header.php"); ?>
	<body class="is-preload">
			<div id="page-wrapper">
				<?php include("navbar.php"); ?>
				<article id="main">
					<header>
						<h3>Admin Page</h3>
					</header><?php include('alert.php'); ?>
					<section class="wrapper style5">
						<div class="inner">
							<div class="row text-center">
								<div class="col-md-4">
									<a href="?page=admin_users_management">
										<label class="form-control btn <?=(($_GET["page"] == "admin_users_management") ? "btn-dark" : "btn-secondary")?>">Users Management</label>
									</a>
								</div>
								<div class="col-md-4">
									<a href="?page=admin_recipient_types_management">
										<label class="form-control btn <?=(($_GET["page"] == "admin_recipient_types_management") ? "btn-dark" : "btn-secondary")?>">Recipient Types Management</label>
									</a>
								</div>
								<div class="col-md-4">
									<a href="?page=admin_donate_types_management">
										<label class="form-control btn <?=(($_GET["page"] == "admin_donate_types_management") ? "btn-dark" : "btn-secondary")?>">Donate Types Management</label>
									</a>
								</div>
							</div>
							<div class="row">
								<?php if ($_GET["page"] == "admin_users_management") { include("admin_users_management.php"); }?>
								<?php if ($_GET["page"] == "admin_recipient_types_management") { include("admin_recipient_types_management.php"); }?>
								<?php if ($_GET["page"] == "admin_donate_types_management") { include("admin_donate_types_management.php"); }?>
							</div>
					</section>
				</article>
				<?php include("footer.php"); ?>
			</div>
	</body>
</html>