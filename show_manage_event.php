<?php include('db/DB_session_Check.php'); ?>
<?php include('db/DB_manage_show_event.php'); ?>
<html>
	<?php include("header.php"); ?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include("navbar.php"); ?>
			<article id="main">
				<header>
					<h3>Management Page</h3>
					<p>สวัสดีครับท่านสมาชิก</p>
					<p><?=$username?></p>
				</header><?php include('alert.php'); ?>
				<section class="wrapper style5">
					<div class="inner">
						<form method="post" action="db/DB_insert_event.php" enctype="multipart/form-data">
							<div class="row gtr-uniform">
								<input type="hidden" name="id" value="<?=((isset($_GET["id"])) ? $_GET["id"] : "")?>">
								<div class="col-6 col-12-xsmall">
									<label for="demo-copy3">Name of The Event</label>
									<input type="text" name="name" id="demo-name" placeholder="Please enter the name of the event" value="<?=((isset($_GET["name"])) ? $_GET["name"] : "")?>"/>
								</div>
								<div class="col-6 col-12-xsmall">
									<label for="demo-copy3">Select time of the event</label>
									<input type="date" id="datepicker" class="form-control" name="date" value="<?=((isset($_GET["date"])) ? $_GET["date"] : "")?>" required>
								</div>
								<div class="form-outline mb-4">
									<input type="file" id="form3Example4cg" class="form-control form-control-lg" name="bg_event"/>
									<label class="form-label" for="form3Example4cg">Upload Event Picture file</label>
								</div>
								<div class="col-12">
									<textarea id="demo-message" placeholder="Enter your message about Event" rows="6" name="subtitles" required><?=((isset($_GET["subtitles"])) ? $_GET["subtitles"] : "")?></textarea>
								</div>
								<div class="col-12">
									<ul class="actions">
									<?php if (isset($_GET["submit_update"])) { ?>
										<li><input type="submit" class="btn btn-success" name="submit_update" value="Update The Event"/></li>
									<?php } else { ?>
										<li><input type="submit" class="btn btn-success" name="submit_insert" value="Insert The Event"/></li> 
									<?php } ?>
										<li><input type="reset" class="btn btn-secondary" value="Reset" /></li>
									</ul>
								</div>
								<div>
									
								</div>
							</div>
						</form>
						<hr>
						<div class="table-wrapper">
							<table id="datatable" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th class="text-center">Name</th>
										<th class="text-center">Description</th>
										<th class="text-center">Date-time</th>
										<th class="text-center">Event</th>
										<th class="text-center">Update</th>
										<th class="text-center">Delete</th>
									</tr>
								</thead>
								<tbody>
								<?php while ($row = mysqli_fetch_assoc($result)) { 
									$subtitles = substr($row["subtitles"], 0, 50); // ตัดที่ 50 คำ
									$subtitles = ((strlen($subtitles) >= 30) ? "$subtitles..." : $subtitles );
								?>
									<tr>
										<td class="text-center"><?=$row["name"]?></td>
										<td class="text-center"><?=$subtitles?></td>
										<td class="text-center"><?=$row["date"]?></td>
										<td class="text-center">
											<a href="show_event.php?user_id=<?=$row["user_id"]?>">
												<i class="fa-solid fa fa-eye fa-xl text-success"></i>
											</a>
										</td>
										<td class="text-center">
											<a href="?&id=<?=$row["id"]?>&name=<?=$row["name"]?>&date=<?=$row["date"]?>&subtitles=<?=$row["subtitles"]?>&bg_event=<?=$row["bg_event"]?>&submit_update=">
												<i class="fa-solid fa fa-edit fa-xl text-primary"></i>
											</a>
										</td>
										<td class="text-center">
											<a href="db/DB_delete.php?delete=&id=<?=$row["id"]?>" onclick='return confirmDelete();'><i class="fa-solid fa fa-trash fa-xl text-danger"></i></a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
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
	$('#datatable').DataTable();
</script>