<html>
	<?php include("header.php"); ?>
	<?php include('db/DB_show_Searching.php'); ?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include("navbar.php"); ?>
			<article id="main">
				<header>
					<h3>Register Page</h3>
				</header><?php include("alert.php"); ?>
				<section class="wrapper style5">
					<div class="inner">
						<form method="post" action="db/DB_register.php" enctype="multipart/form-data"> <!-- add enctype="multipart/form-data" เมื่อต้องการ upload file -->
							<div class="row gtr-uniform">
								<div class="col-4 col-12-xsmall">
									<label>ใส่ Username ผู้รับบริจาค</label>
									<input type="text" name="username" id="demo-username"  placeholder="Name of donor recipient " required />
								</div>
								<div class="col-4 col-12-xsmall">
									<label>*Password</label>
									<input type="password" name="password" id="demo-password"  placeholder="Password " required />
								</div>
								<div class="col-4 col-12-xsmall">
									<label>*ยืนยัน Password</label>
									<input type="password" name="confirm_password" id="demo-confirm-password"  placeholder="Confirm Password " required />
									<div class="invalid-feedback">*Confirm password doesn't match</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<label>ชื่อ</label>
									<input type="text" name="firstname" id="demo-username"  placeholder="Firstname " />
								</div>
								<div class="col-6 col-12-xsmall">
									<label>นามสกุล</label>
									<input type="text" name="lastname" id="demo-username"  placeholder="Lastname " />
								</div>
								<div class="col-12 col-12-xsmall">
									<label>*ชื่อสถานรับบริจาค</label>
									<input type="text" name="donorname" id="demo-username"  placeholder="Donorname " required />
								</div>
								<!-- <div class="col-12 col-12-xsmall">
									<label>*สถานที่ตั้ง</label>
									<input type="text" name="location" id="demo-location"  placeholder="Your Location (province -- district -- Street -- Number )" required />
								</div> -->
								<div class="col-12 col-12-xsmall">
									<label>ช่องทางการติดต่อ</label>
									<input type="text" name="contact" id="demo-contact"  placeholder="Your Contact (Phone_Number or Email or LineID or Other )" required/>
								</div>
								<div class="col-md-6 col-12-xsmall">
									<label>*ประเภทของสถานรับบริจาค</label>
									<select  id="demo-category2" name="donor_recipient_type_id" required>
										<option value="">- Please Select -</option>
									<?php while ($row = mysqli_fetch_assoc($resultGetDonorRecipientTypes)) { ?>
										<option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
									<?php } ?>
									</select>
								</div>
								<!-- <div class="col-12 col-12-small" >
									<label for="demo-copy4">*เลือกสิ่งที่ต้องการรับบริจาคเป็นพิเศษ (ถ้าไม่ใส่ถือว่าต้องการทั้งหมด)</label>
									<select class="form-select" id="multiple-select-field" name="donate_type_id[]" data-placeholder="Choose anything" multiple required>
									<?php 
										// $i=0; while ($row = mysqli_fetch_assoc($resultDonateTypes)) { 
									?>
										<option value="<?=$row["id"]?>"><?=$row["name"]?></option>
									<?php
										// $i++; }
									?>
									</select>
								</div> -->
								<div class="form-outline mb-4">
									<input type="file" id="form3Example4cg" class="form-control form-control-lg" name="picture" required/>
									<label class="form-label" for="form3Example4cg">ใส่หลักฐานทางราชการที่ยืนยันสถานะของสถานะปัจจุบันของสถานรับบริจาค</label>
								</div>
								<div class="col-12">
									<label>เกี่ยวกับสถานรับบริจาค</label>
									<textarea id="demo-message" placeholder="Enter your message about donor recipient" rows="6" name="subtitles"></textarea>
								</div>
								<div class="col-4 col-12-xsmall">
									<ul class="actions">
										<li><input type="submit" value="register" class="btn btn-success" name="register"/></li>
										<li><input type="reset" value="reset" class="btn btn-secondary"/></li>
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

<script>
	$(document).ready(() => {
		$('form').submit((e) => {
			$('.invalid-feedback').removeClass('show-invalid')
			if ($('#demo-password').val() != $('#demo-confirm-password').val()) {
				e.preventDefault()
				$('.invalid-feedback').addClass('show-invalid')
				$('#demo-confirm-password').focus()
				return
			}

			// if ($('div.checkbox-group.required :checkbox:checked').length <= 0) {
			// 	e.preventDefault()
			// 	$('div.checkbox-group.required :checkbox')[0].focus()
			// 	return
			// }
		})
	})

	$('#multiple-select-field').select2( {
		theme: "bootstrap-5",
		width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
		placeholder: $( this ).data( 'placeholder' ),
		closeOnSelect: false,
	});
	
</script>