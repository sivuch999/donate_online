<html>
	<?php include("header.php"); ?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include("navbar.php"); ?>
			<article id="main">
				<header>
					<h3>Searched Page</h3>
					<p>สวัสดีครับท่านสมาชิก</p>
				</header>
				<section class="wrapper style5">
					<div class="inner">
						<form method="post" action="db/DB_searched.php">
							<div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<input type="text" name="search_name" id="demo-name" placeholder="Name of donor recipient "/>
								</div>
								<div class="col-6">
									<select  id="demo-category2"  name="search_type">
									<option value="">- Type of donor recipient -</option>
										<option value="Community-Based Organizations">Community-Based Organizations</option>
										<option value="Educational Organizations">Educational Organizations</option>
										<option value="Health Organizations">Health Organizations</option>
										<option value="Religious Organizations">Religious Organizations</option>
										<option value="Arts and Culture Organizations">Arts and Culture Organizations</option>
										<option value="Environmental Organizations">Environmental Organizations</option>
										<option value="Social Services Organizations">Social Services Organizations</option>
										<option value="Charitable Organizations">Charitable Organizations</option>
									</select>
								</div>
								<div class="col-12 col-12-small">
									<input type="checkbox" id="demo-copy" name="request_item[]" value="Mechanic_tool" >
									<label for="demo-copy">Mechanic tool</label>

									<input type="checkbox" id="demo-copy1" name="request_item[]" value="Food">
									<label for="demo-copy1">Food</label>

									<input type="checkbox" id="demo-copy2" name="request_item[]" value="Clothes">
									<label for="demo-copy2">Clothes</label>

									<input type="checkbox" id="demo-copy3" name="request_item[]" value="Items_for_children">
									<label for="demo-copy3">Items for children</label>
									<label for="demo-copy4">(Identify what type of goods that you want to donate)</label>
								</div>
								<div class="col-12">
									<ul class="actions">
										<li><input type="submit" class="primary" name="Searching" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</div>
							</div>
						</form>
						<hr/>
						<h5>Infomation</h5>
						<div class="table-wrapper">
							<table class="alt">
								<thead>
									<tr>
										<th>Name</th>
										<th>Description</th>
										<th>Type</th>
										<th>Location</th>
										<th>btn</th>
									</tr>
								</thead>
								<tbody>
									<?php include('db/DB_show_searched.php'); ?>
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