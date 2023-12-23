<?php include('db/DB_event_show_form.php'); ?>
<html>
	<?php include('header.php'); ?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include('navbar.php'); ?>
			<article id="main" >
				<header>
					<h3>Event Page</h3>
					<p><?=$username?></p>
				</header>
				<section id="two" class="wrapper alt style2">
				<?php while ($row = mysqli_fetch_assoc($result)) {
					$date = $row['date'];
					$bg_event = "image_event/".$row['bg_event'];
				?>
					<section class="spotlight">
						<div class="image"><img src="<?=$bg_event?>" alt="ภาพ event" /></div>
						<div class="content">
							<h3><?=$row['name']?></h3><br />
							<p><?=$row['subtitles']?></p>
							<p><?=$date?></p>
						</div>
					</section>
				<?php } ?>
				</section>
			</article>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>