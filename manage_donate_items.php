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
					<th class="text-center">Status</th>
					<th class="text-center">Approve</th>
					<th class="text-center">Reject</th>
				</tr>
			</thead>
			<tbody>
			<?php $i=1; while ($row = mysqli_fetch_assoc($resultUserDonateItems)) { 
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
                    <td class="text-center"><?=$status[$row["status"]]?></td>
                    <td class="text-center">
						<?php if ($row["status"] == '0') { ?>
                        <a href="?page=manage_donate_items&id=<?=$row["id"]?>&status=1&submit_update=" onclick='return confirmItems(1);'>
							<i class="fa-solid fa fa-check fa-xl text-success"></i>
						</a>
                        <?php } ?>
					</td>
					<td class="text-center">
                        <?php if ($row["status"] == '0') { ?>
						<a href="?page=manage_donate_items&id=<?=$row["id"]?>&status=2&submit_update=" onclick='return confirmItems(2);'>
							<i class="fa-solid fa fa-close fa-xl text-danger"></i>
						</a>
                        <?php } ?>
					</td>
				</tr>
			<?php $i++; } ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript"> // ยืนยันว่าต้องการจะ Delete
	function confirmItems(status) {
		if (status == 1) {
			return confirm('Are you sure you want to approved?');
		} else {
			return confirm('Are you sure you want to rejected?');
		}
	}
</script>