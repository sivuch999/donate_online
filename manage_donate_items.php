<div class="inner">
	<div class="table-wrapper">
		<table id="datatable" class="table table-striped" style="width:100%">
			<thead>
				<tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Type</th>
					<th class="text-center">Name</th>
					<th class="text-center">Donor</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">File</th>
					<th class="text-center">Status</th>
				<?php if ($_GET["page"] == "manage_donate_items" || $_GET["page"] == "admin_manage_request_items") { ?>
					<!-- <th class="text-center">A/R</th> -->
				<?php } else if ($_GET["page"] == "manage_request_items") { ?>
					<th class="text-center">Request</th>
				<?php } ?>
				<?php if ($_GET["page"] == "admin_manage_request_items") { ?>
					<!-- <th class="text-center">Requested</th>
					<th class="text-center">RA/RR</th> -->
				<?php } ?>
				</tr>
			</thead>
			<tbody>
			<?php $i=1; while ($row = mysqli_fetch_assoc($resultUserDonateItems)) { 
				$donorName = substr($row["donor_name"], 0, 100); // ตัดที่ 100 คำ
				$donorName = ((strlen($donorName) > 100) ? "$donorName..." : $donorName );

				$reqRonorName = "";
				if (isset($row["req_user_id"]) && !empty($row["req_user_id"])) {
					$reqRonorName = substr($row["req_donorname"], 0, 100); // ตัดที่ 100 คำ
					$reqRonorName = ((strlen($reqRonorName) > 100) ? "$reqRonorName..." : $reqRonorName );
				}

                $status = ["WAITING", "APPROVED", "REJECTED"];
			?>
				<tr>
                    <td class="text-center"><?=$i?></td>
                    <td class="text-center"><?=$row["donate_type_name"]?></td>
					<td class="text-center"><?=((isset($row["req_user_id"])) ? "(System) " : "" ).$row["name"]?></td>
					<td class="text-center"><?=$donorName?></td>
                    <td class="text-center"><?=$row["created_at"]?></td>
                    <td class="text-center">
                        <?php if (!empty($row["picture"])) { ?>
                        <a target="_blank" href="<?=$row["picture"]?>"><i class="fa-solid fa-file fa-xl"></i></a>
                        <?php } ?>
                    </td>
                    <td class="text-center"><?=$status[$row["status"]]?></td>
				<?php if ($_GET["page"] == "manage_donate_items" || $_GET["page"] == "admin_manage_request_items") { ?>
                    <!-- <td class="text-center"> -->
					<?php if ($row["status"] == '0') { ?>
                        <!-- <a class="form-control" style="text-decoration:unset;"
							href="?page=<?=$_GET["page"]?>&id=<?=$row["id"]?>&status=1&submit_update=" onclick='return confirmItems(1);'>
							<i class="fa-solid fa fa-check fa-xl text-success"></i>
						</a>
						<a class="form-control" style="text-decoration:unset;" 
							href="?page=<?=$_GET["page"]?>&id=<?=$row["id"]?>&status=2&submit_update=" onclick='return confirmItems(2);'>
							<i class="fa-solid fa fa-close fa-xl text-danger"></i>
						</a> -->
					<?php } ?>
					<!-- </td> -->
				<?php } else if ($_GET["page"] == "manage_request_items") { ?>
					<td class="text-center">
                        <a href="?page=<?=$_GET["page"]?>&id=<?=$row["id"]?>&req_user_id=<?=$_SESSION["id"]?>&submit_update=" onclick='return confirmItems(3);'>
							<i class="fa-solid fa fa-hand fa-xl text-warning"></i>
						</a>
					</td>
				<?php } ?>
				<?php if ($_GET["page"] == "admin_manage_request_items") { ?>
					<!-- <td class="text-center"><?=$reqRonorName?></td>
					<td class="text-center"> -->
					<?php if (isset($row["req_user_id"]) && !empty($row["req_user_id"] && empty($row["user_id"]))) { ?>
                        <!-- <a class="form-control" style="text-decoration:unset;"
							href="?page=<?=$_GET["page"]?>&id=<?=$row["id"]?>&req_user_id=<?=$row["req_user_id"]?>&is_req_approve=1&submit_update=" onclick='return confirmItems(1);'>
							<i class="fa-solid fa fa-check fa-xl text-success"></i>
						</a>
						<a  class="form-control" style="text-decoration:unset;"
							href="?page=<?=$_GET["page"]?>&id=<?=$row["id"]?>&req_user_id=<?=$row["req_user_id"]?>&is_req_approve=0&submit_update=" onclick='return confirmItems(1);'>
							<i class="fa-solid fa fa-close fa-xl text-danger"></i>
						</a> -->
					<?php } ?>
					<!-- </td> -->
				<?php } ?>
				</tr>
			<?php $i++; } ?>
			</tbody>
		</table>
	</div>

<!-- Show Wating for approve Table -->
<!-- <?php if ($_GET["page"] == "manage_request_items") { ?>
	<div class="table-wrapper mt-5">
		<h4>Waiting for approve</h4>
		<table class="table table-striped" style="width:100%">
			<thead>
				<tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Type</th>
					<th class="text-center">Name</th>
					<th class="text-center">Donor</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">File</th>
				</tr>
			</thead>
			<tbody>
			<?php $i=1; while ($row = mysqli_fetch_assoc($resultRequestedItems)) { 
				$donorName = substr($row["donor_name"], 0, 50); // ตัดที่ 100 คำ
				$donorName = ((strlen($donorName) > 50) ? "$donorName..." : $donorName );
                $status = ["WAITING", "APPROVED", "REJECTED"];
			?>
				<tr>
                    <td class="text-center"><?=$i?></td>
                    <td class="text-center"><?=$row["donate_type_name"]?></td>
					<td class="text-center"><?=$row["name"]?></td>
					<td class="text-center"><?=$donorName?></td>
                    <td class="text-center"><?=$row["created_at"]?></td>
                    <td class="text-center">
                        <?php if (!empty($row["picture"])) { ?>
                        <a target="_blank" href="<?=$row["picture"]?>"><i class="fa-solid fa-file fa-xl"></i></a>
                        <?php } ?>
                    </td>
				</tr>
			<?php $i++; } ?>
			</tbody>
		</table>
	</div>
<?php } ?> -->

</div>

<script> // ยืนยันว่าต้องการจะ Delete
	function confirmItems(status) {
		if (status == 1) {
			return confirm('Are you sure you want to approved?');
		} else if (status == 2) {
			return confirm('Are you sure you want to rejected?');
		} else if (status == 3) {
			return confirm('Are you sure you want to requested?');
		}
	}
</script>