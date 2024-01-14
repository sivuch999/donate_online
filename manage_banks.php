<div class="inner">
	<form method="post" action="" enctype="multipart/form-data">
		<div class="row gtr-uniform">
			<input type="hidden" name="id" value="<?=((isset($_SESSION["id"])) ? $_SESSION["id"] : "")?>">
			<div class="col-4 col-12-xsmall">
                <label>*Bank</label>
                <select name="bank_id" required>
                    <option value="">- Please Select -</option>
                    <?php while ($row = mysqli_fetch_assoc($resultBanks)) { ?>
                        <option value="<?=$row["id"]?>" <?=(isset($rowUsers["bank_id"]) && $row["id"] == $rowUsers["bank_id"]) ? "selected" : "" ?>><?=$row["name"]?></li>
                    <?php } ?>
                </select>
			</div>
			<div class="col-4 col-12-xsmall">
				<label for="demo-copy3">*Account Fullname</label>
				<input type="text" class="form-control" name="bank_account_fullname" value="<?=((isset($rowUsers["bank_account_fullname"])) ? $rowUsers["bank_account_fullname"] : "")?>" required>
			</div>
			<div class="col-4 col-12-xsmall">
				<label for="demo-copy3">*Account Number</label>
				<input type="text" class="form-control" name="bank_account_number" value="<?=((isset($rowUsers["bank_account_number"])) ? $rowUsers["bank_account_number"] : "")?>" required>
			</div>
			<div class="form-outline mb-4">
				<div class="text-center">
				<?php if (isset($rowUsers["bank_account_qrcode"]) && !empty($rowUsers["bank_account_qrcode"])) { ?>
					<img style="max-width: 15rem;" src="<?=$rowUsers["bank_account_qrcode"]?>" alt="ภาพ qrcode" />
				<?php } ?>
				</div>
                <label class="form-label">Upload Account QR Code</label>
				<input type="file" class="form-control form-control-lg" name="bank_account_qrcode"/>
			</div>
			<div class="col-12">
				<ul class="actions">
				    <li><input type="submit" class="btn btn-success" name="submit_update" value="Update The Bank Account"/></li>
					<li><input type="reset" class="btn btn-secondary" value="Reset" /></li>
				</ul>
			</div>
		</div>
	</form>
</div>