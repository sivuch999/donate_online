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
				<section id="one" class="row wrapper alt style2">
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
				<section id="two" class="row wrapper alt style2 p-4">
					<div class="col-12 mt-3 text-center">
						<h2>ร่วมเป็นส่วนหนึ่งกับเรา</h2>
					</div>
					<div class="col-12 mt-4">
						<h4>ช่องทาง: บริจาคสิ่งของ</h4>
						<form method="post" action="db/DB_update_event.php" enctype="multipart/form-data">
							<input type="hidden" name="user_id" value="<?=$_GET["user_id"]?>">
							<input type="hidden" name="go_page" value="../show_event.php?user_id=<?=$_GET["user_id"]?>">
							<div class="row gtr-uniform text-white">
								<div class="col-12 col-12-xsmall">
									<label>ชื่อหรือรายละเอียดผู้บริจาค</label>
									<input type="text" name="donor_name"/>
								</div>
							</div>
							<div id="form-input" class="gtr-uniform text-white mt-3">
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
									<input type="submit" class="form-control btn btn-success" name="submit_save_donate_items" value="ยืนยัน" >
								</div>
							</div>
						</form>
					</div>
					<?php if (isset($rowUsers['bank_name']) && !empty($rowUsers['bank_name'])) { ?>
					<div class="col-12 mt-3">
						<h4>ช่องทาง: เลขบัญชี</h4>
						<div class="spotlight"></div>
						<div class="spotlight">
							<div class="content">
								<h3>ธนาคาร: <?=$rowUsers['bank_name']?></h3><br/>
								<p>หมายเลขบัญชี: <?=$rowUsers['bank_account_number']?></p>
								<p>ชื่อเจ้าของบัญชี: <?=$rowUsers['bank_account_fullname']?></p>
							</div>
							<div class="text-center">
								<?php if (isset($rowUsers["bank_account_qrcode"]) && !empty($rowUsers["bank_account_qrcode"])) { ?>
								<img style="max-width: 15rem;" src="<?=$rowUsers["bank_account_qrcode"]?>" alt="ภาพ qrcode" />
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
				</section>
			</article>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>