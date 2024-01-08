<html>
	<?php include("header.php")?>
	<?php include('db/DB_show_Searching.php')?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include("navbar.php")?>
			<article id="main">
				<header>
					<h3>Searching Page</h3>
					<p>สวัสดีครับท่านสมาชิก</p>
				</header>
				<section class="wrapper style5">
					<div class="inner">
						<form method="get" action="">
							<div class="row gtr-uniform">
								<div class="col-md-6 col-12-xsmall">
									<label>Name of donor recipient</label>
									<input
										type="text"
										name="donorname"
										id="demo-name"
										placeholder="Empty is all"
										value="<?=((isset($_GET["donorname"])) ? $_GET["donorname"] : "") ?>"
									/>
								</div>
								<div class="col-md-6 col-12-xsmall">
									<label>Type of donor recipient</label>
									<select id="demo-category2" name="donor_recipient_type_id">
										<option value="">- All -</option>
									<?php while ($row = mysqli_fetch_assoc($resultGetDonorRecipientTypes)) { ?>
										<option
											value="<?=$row["id"] ?>" 
											<?=(($_GET["donor_recipient_type_id"] == $row["id"]) ? "selected" : "") ?>
										>
											<?=$row["name"]?>
										</option>
									<?php } ?>
									</select>
								</div>
								<div class="col-md-12 col-12-xsmall">
									<label>Location</label>
									<input
										type="text"
										name="location"
										id="demo-name"
										placeholder="Empty is all"
										value="<?=((isset($_GET["location"])) ? $_GET["location"] : "") ?>"
									/>
								</div>
								<div class="col-md-12 col-12-small">
									<label for="demo-copy4">Identify what type of goods that you want to donate (Not checking means selecting all)</label>
									<div>
									<?php $i=0; while ($row = mysqli_fetch_assoc($resultGetDonateTypes)) { ?>
										<?php
											$checked = "";
											if (isset($_GET["donate_type_id"])) {
												if (in_array($row["id"], $_GET["donate_type_id"])) {
													$checked = "checked";
												}
											}	
										?>
										<input type="checkbox" id="demo-copy<?=$i?>" name="donate_type_id[]" value="<?=$row["id"] ?>" <?=$checked?> >
										<label for="demo-copy<?=$i?>"><?=$row["name"] ?></label>
									<?php $i++; } ?>
									</div>
								</div>
								<div class="col-md-12">
									<input type="submit" class="btn btn-success form-control" name="submit" value="search"/>
								</div>
							</div>
						</form>
						<hr/>
						<div class="container-fluid">
							<div class="row">
							<?php $conditionGetUser; while ($row = mysqli_fetch_assoc($resultGetUser)) { $subtitles = $row["subtitles"]?>
								<div class="col-md-4 mb-4">
									<div class="card">
										<div class="card-body" style="overflow: hidden;">
											<h6 class="card-title"><?=$row["donorname"]?></h6>
											<p class="card-subtitle mb-2 text-muted inline-overflow-wrap" style="font-size: 0.5rem;"><?=$row["donor_recipient_types_name"]?></p>
											<p class="card-subtitle mb-2 text-muted inline-overflow-wrap" style="font-size: 0.5rem;"><?=$row["location"]?></p>
											<hr/>
											<p class="card-text overflow-scroll" style="height: 10rem"><?=$subtitles?></p>
										</div>
										<div class="card-body ">
											<div class="list-group list-group-flush" >
												<a href="show_event.php?user_id=<?=$row["id"]?>"><button class="btn btn-dark form-control">View</button></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							</div>
						</div>
				</section>
			</article>
			<?php include("footer.php")?>
		</div>
	</body>
</html>