<?php include('db/DB_event_show_form.php'); ?>
<html>
	<?php include('header.php'); ?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include('navbar.php'); ?>
			<article id="main" >
				<header>
					<h3>Event Page</h3>
					<p><?=((isset($_SESSION['donorname']) && !empty($_SESSION['donorname'])) ? $_SESSION['donorname'] : "")?></p>
				</header><?php include('alert.php'); ?>
				<section id="two" class="row wrapper alt style2">
				<?php while ($row = mysqli_fetch_assoc($result)) { ?>
					<div class="spotlight">
						<div class="image"><img src="<?=$row["bg_event"]?>" alt="ภาพ event" /></div>
						<div class="content">
							<h3><?=$row['name']?></h3><br />
							<p><?=$row['subtitles']?></p>
							<p><?=$row['date']?></p>
						</div>
					</div>
				<?php } ?>
				</section>
				<section id="three" class="row wrapper alt style2 p-4">
					<div class="col-12 mt-3">
						<h2>ร่วมเป็นส่วนหนึ่งกับเรา</h2>
					</div>
					<div class="col-12 mt-4">
						<form method="post" action="" enctype="multipart/form-data">
							<input type="hidden" name="user_id" value="<?=$_GET["user_id"]?>">
							<div class="row gtr-uniform text-white">
								<div class="col-12 col-12-xsmall">
									<label>ชื่อหรือรายละเอียดผู้บริจาค</label>
									<input type="text" name="donor_name"/>
								</div>
							</div>
							<div id="form-input" class="row gtr-uniform text-white mt-3">
								<div class="row form-input-wrapper">
									<div class="col-3 col-12-xsmall">
										<label>*สิ่งของที่ต้องการบริจาค</label>
										<input type="text" name="name[]" placeholder="Please enter the name of the item" required/>
									</div>
									<div class="col-2 col-12-xsmall">
										<label>*ประเภท</label>
										<select name="donate_type_id[]" required>
											<option value="">- Please Select -</option>
											<?php while ($row = mysqli_fetch_assoc($resultDonateTypes)) { ?>
												<option value="<?=$row["id"]?>"><?=$row["name"]?></li>
											<?php } ?>
										</select>
									</div>
									<div class="col-1 col-12-xsmall">
										<label>*จำนวน</label>
										<input type="number" name="amount[]" placeholder="" value="1" required/>
									</div>
									<div class="col-1 col-12-xsmall">
										<label>*หน่วย</label>
										<input type="text" name="unit[]" placeholder="" required/>
									</div>
									<div class="col-4 col-12-xsmall">
										<label>รูป</label>
										<input type="file" class="form-control form-control-lg" name="picture[]"/>
									</div>
									<div class="col-1 col-12-xsmall">
										<label>ลบแถว</label>
										<button type="button" class="form-control btn btn-danger" style="height: 2.75em" onclick="deleteRow(this)">X</button>
									</div>
								</div>
							</div>
							<div class="row text-white mt-5">
								<div class="col-12 col-12-xsmall">
									<input type="button" class="form-control btn btn-secondary" value="เพิ่มแถว" onclick="addInput()">
								</div>
							</div>
							<div class="row text-white mt-5">
								<div class="col-12 col-12-xsmall">
									<input type="submit" class="form-control btn btn-success" name="submit" value="ยืนยัน" >
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

<script>
	function addInput() {
            let newInput = `
				<div class="row form-input-wrapper">
					<div class="col-3 col-12-xsmall">
						<label>*สิ่งของที่ต้องการบริจาค</label>
						<input type="text" name="name[]" placeholder="Please enter the name of the item" required/>
					</div>
					<div class="col-2 col-12-xsmall">
						<label>*ประเภท</label>
						<select name="donate_type_id[]" required>
							<option value="">- Please Select -</option>
							<?php mysqli_data_seek($resultDonateTypes, 0); // Reset pointer to the beginning ?>
							<?php while ($row = mysqli_fetch_assoc($resultDonateTypes)) { ?>
								<option value="<?=$row["id"]?>"><?=$row["name"]?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-1 col-12-xsmall">
						<label>*จำนวน</label>
						<input type="number" name="amount[]" placeholder="" value="1" required/>
					</div>
					<div class="col-1 col-12-xsmall">
						<label>*หน่วย</label>
						<input type="text" name="unit[]" placeholder="" required/>
					</div>
					<div class="col-4 col-12-xsmall">
						<label>รูป</label>
						<input type="file" class="form-control form-control-lg" name="picture[]"/>
					</div>
					<div class="col-1 col-12-xsmall">
						<label>*ลบแถว</label>
						<button type="button" class="form-control btn btn-danger" style="height: 2.75em" onclick="deleteRow(this)">X</button>
					</div>
				</div>`;
			$("#form-input").append(newInput)
            // document.getElementById("form-input").insertAdjacentHTML("beforeend", newInput);
        }
		function deleteRow(button) {
			let row = $(button).parent().parent()
			if (row.parent().find(".form-input-wrapper").length <= 1) {
				return
			}
            row.remove()
        }
</script>