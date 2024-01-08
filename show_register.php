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
									<label>*Name of donor recipient</label>
									<input type="text" name="username" id="demo-username"  placeholder="Name of donor recipient " required />
								</div>
								<div class="col-4 col-12-xsmall">
									<label>*Password</label>
									<input type="password" name="password" id="demo-password"  placeholder="Password " required />
								</div>
								<div class="col-4 col-12-xsmall">
									<label>*Confirm Password</label>
									<input type="password" name="confirm_password" id="demo-confirm-password"  placeholder="Confirm Password " required />
									<div class="invalid-feedback">*Confirm password doesn't match</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<label>Firstname</label>
									<input type="text" name="firstname" id="demo-username"  placeholder="Firstname " />
								</div>
								<div class="col-6 col-12-xsmall">
									<label>Lastname</label>
									<input type="text" name="lastname" id="demo-username"  placeholder="Lastname " />
								</div>
								<div class="col-12 col-12-xsmall">
									<label>*Donorname</label>
									<input type="text" name="donorname" id="demo-username"  placeholder="Donorname " required />
								</div>
								<div class="col-12 col-12-xsmall">
									<label>*Location</label>
									<input type="text" name="location" id="demo-location"  placeholder="Your Location (province -- district -- Street -- Number )" required />
								</div>
								<div class="col-12 col-12-xsmall">
									<label>*Contact</label>
									<input type="text" name="contact" id="demo-contact"  placeholder="Your Contact (Phone_Number or Email or LineID or Other )" required/>
								</div>
								<div class="col-md-6 col-12-xsmall">
									<label>*Type of donor recipient</label>
									<select  id="demo-category2" name="donor_recipient_type_id" required>
										<option value="">- Please Select -</option>
									<?php while ($row = mysqli_fetch_assoc($resultGetDonorRecipientTypes)) { ?>
										<option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
									<?php } ?>
									</select>
								</div>
								<div class="col-12 col-12-small" >
									<label for="demo-copy4">*Identify what type of goods that you want to donate (Not checking means selecting all)</label>
									<div class="checkbox-group required">
									<?php $i=0; while ($row = mysqli_fetch_assoc($resultGetDonateTypes)) { ?>
										<input type="checkbox" id="demo-copy<?=$i?>" name="donate_type_id[]" value="<?= $row["id"] ?>">
										<label for="demo-copy<?=$i?>"><?= $row["name"] ?></label>
									<?php $i++; } ?>
									</div>
								</div>
								<div class="form-outline mb-4">
									<input type="file" id="form3Example4cg" class="form-control form-control-lg" name="picture" required/>
									<label class="form-label" for="form3Example4cg">*Upload picture file</label>
								</div>
								<div class="col-12">
									<label>*Subtitles</label>
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

			if ($('div.checkbox-group.required :checkbox:checked').length <= 0) {
				e.preventDefault()
				$('div.checkbox-group.required :checkbox')[0].focus()
				return
			}
		})
	})
	
</script>