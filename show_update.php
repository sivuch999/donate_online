<?php include('db/DB_session_Check.php'); ?>
<html>
	<?php include("header.php"); ?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include("navbar.php"); ?>
			<article id="main"  >
				<header>
					<h3>Management Page</h3>
					<p>สวัสดีครับท่านสมาชิก</p>
					<p><?php echo "$username"; ?></p>
				</header>
				<section class="wrapper style5">
					<div class="inner">
						<form method="post" action="db/DB_update_event.php" enctype="multipart/form-data">
							<div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<input type="text" name="insert_event_name" id="demo-name" placeholder="Name of The Event " value = "<?php echo $_POST["event_name"] ?>" />
									<input type='hidden' name='id_event' value=' <?php echo $_POST["id_event"] ?>'>
								</div>
								<div class="col-6 col-12-xsmall">
									<input type="datetime-local"  name="event_date" >
									<label for="demo-copy3">(Select time of the event)</label>
								</div>
								<div class="form-outline mb-4">
									<input type="file" id="form3Example4cg" class="form-control form-control-lg" name="bg_event"required />
									<label class="form-label" for="form3Example4cg">Upload Event Picture file</label>
								</div>
								<div class="col-12">
									<textarea  id="demo-message" placeholder="Enter your message about Event" rows="6" name="subtitles_event" ></textarea>
								</div>
								<div class="col-12">
 									<ul class="actions">
										<li><input type="submit" class="primary" name="update_The_Event" value="Update The Event"/></li> <!--ต้องระบุชื่อ name="...." อย่าเผอใช้ value -->
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>
			</article>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>

<script type="text/javascript"> // ยืนยันว่าต้องการจะ Delete
	function confirmDelete() {
		return confirm('Are you sure you want to delete this event?');
	}
</script>