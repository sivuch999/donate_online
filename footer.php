<footer id="footer">
    <ul class="icons">
        <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
        <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
    </ul>
    <ul class="copyright">
        <li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
</footer>

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script>
    $(document).ready(function(){
        setTimeout(function(){
            $(".alert").alert('close');
        }, 3000);
    });
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