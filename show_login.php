<html>
	<?php session_start(); ?>
	<?php include("header.php"); ?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include("navbar.php"); ?>
			<article id="main">
				<header>
					<h3>Login Page</h3>
				</header><?php include('alert.php'); ?>
				<section class="wrapper style5">
					<div class="inner">
						<form method="post" action="db/DB_login.php">
							<div class="row gtr-uniform">
								<div class="col-12 col-12-xsmall">
									<input type="text" name="username" id="demo-username" placeholder="Username " required/>
								</div>
								<div class="col-12 col-12-xsmall">
									<input type="password" name="password" id="demo-password" placeholder="Password " required/>
								</div>
								<div class="col-4 col-12-xsmall">
									<ul class="actions">
										<li><input type="submit" value="Login" class="btn btn-success" name="login"/></li>
										<li><input type="reset" value="Reset" class="btn btn-secondary"/></li>
									</ul>
								</div>  
							</div>
						</form>	
						<hr/>
					</div>
				</section>
			</article>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>