<html>
	<?php session_start(); ?>
	<?php include("header.php")?>
	<?php include('db/DB_show_Searching.php')?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include("navbar.php")?>
			<article id="main">
				<header>
					<h3>Searching Page</h3>
					<p>สวัสดีครับท่านสมาชิก</p>
				</header><?php include('alert.php'); ?>
				<section class="wrapper style5">
                    <div class="inner">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <a href="?page=searching_user">
                                    <label class="form-control btn <?=(($_GET["page"] == "searching_user") ? "btn-dark" : "btn-secondary")?>">Donate User</label>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="?page=searching_website">
                                    <label class="form-control btn <?=(($_GET["page"] == "searching_website") ? "btn-dark" : "btn-secondary")?>">Donate Website</label>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <?php if ($_GET["page"] == "searching_user") { include("searching_user.php"); }?>
                            <?php if ($_GET["page"] == "searching_website") { include("searching_website.php"); }?>
                        </div>
					</div>
				</section>
			</article>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>