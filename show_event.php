<?php include('db/DB_event_show_form.php'); ?>
<html>
	<?php include('header.php'); ?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include('navbar.php'); ?>
			<article id="main" >
				<header>
					<h3>Donate Items Page</h3>
					<p><?=((isset($rowUsers['donorname']) && !empty($rowUsers['donorname'])) ? $rowUsers['donorname'] : "")?></p>
				</header><?php include('alert.php'); ?>
				<section id="one" class="row wrapper alt style2 pt-3">
				<?php while ($row = mysqli_fetch_assoc($result)) { ?>
					<!-- <div class="row"> -->
					<?php
						$picture = "noimage.png";
						if(isset($row["picture"]) && !empty($row["picture"])) { $picture = $row["picture"]; }
					?>
						<div class="col-md-8 text-center pt-4">
							<label style="color:white; font-size: 1.5rem"><?=$row['name']?></label>
							<!-- <p><?=$row['subtitles']?></p> -->
							<!-- <p><?=$row['date']?></p> -->
						</div>
						<div class="col-md-4 text-center p-1">
							<a href="<?=$picture?>" target="_blank">
								<img style="max-width: 100px;" src="<?=$picture?>" alt="ภาพ event" />
							</a>
						</div>
					<!-- </div> -->
				<?php } ?>
				</section>
				<section id="two" class="row wrapper alt style2 p-4">
					<?php if (isset($rowUsers['bank_name']) && !empty($rowUsers['bank_name'])) { ?>
					<div class="col-12 mt-3 text-center">
						<h2>ร่วมเป็นส่วนหนึ่งกับเรา</h2>
					</div>
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