<div class="container mt-3">
    <div class="col-12">
        <h4 style="color: unset;">รวมบริจาคสิ่งของกับเว็บไซต์ของเรา</h4>
        <form method="post" action="db/DB_update_event.php" enctype="multipart/form-data" class="mt-3">
        <input type="hidden" name="go_page" value="../show_Searching.php?page=searching_website">
            <div class="row gtr-uniform">
                <div class="col-md-12 col-12-xsmall">
                    <label>ชื่อหรือรายละเอียดผู้บริจาค</label>
                    <input type="text" name="donor_name"/>
                </div>
                <div class="col-md-4 col-12-xsmall">
                    <label>อีเมล</label>
                    <input type="text" name="donor_email"/>
                </div>
                <div class="col-md-4 col-12-xsmall">
                    <label>หมายเลขโทรศัพท์</label>
                    <input type="text" name="donor_tel"/>
                </div>
                <div class="col-md-4 col-12-xsmall">
                    <label>ช่องทางอื่นๆ</label>
                    <input type="text" name="donor_contact"/>
                </div>
                <div id="form-input" class="gtr-uniform mt-3">
                    <div class="row form-input-wrapper">
                        <div class="col-md-3 col-12-xsmall">
                            <label>*สิ่งของที่ต้องการบริจาค</label>
                            <input type="text" name="name[]" placeholder="Please enter the name of the item" required/>
                        </div>
                        <!-- <div class="col-2 col-12-xsmall">
                            <label>*ประเภท</label>
                            <select name="donate_type_id[]" required>
                                <option value="">- Please Select -</option>
                                <?php mysqli_data_seek($resultDonateTypes, 0); ?>
                                <?php while ($row = mysqli_fetch_assoc($resultDonateTypes)) { ?>
                                    <?php if ($_GET["page"] == "searching_website" && ($row["id"] == 9 || $row["name"] == "Money")) { continue; }?>
                                    <option value="<?=$row["id"]?>"><?=$row["name"]?></li>
                                <?php } ?>
                            </select>
                        </div> -->
                        <div class="col-md-2 col-12-xsmall">
                            <label>*จำนวน</label>
                            <input type="number" name="amount[]" placeholder="" value="1" required/>
                        </div>
                        <div class="col-md-2 col-12-xsmall">
                            <label>*หน่วย</label>
                            <input type="text" name="unit[]" placeholder="" required/>
                        </div>
                        <div class="col-md-4 col-12-xsmall">
                            <label>รูป</label>
                            <input type="file" class="form-control form-control-lg" name="picture[]"/>
                        </div>
                        <div class="col-md-1 col-12-xsmall">
                            <label>ลบแถว</label>
                            <button type="button" class="form-control btn btn-danger" style="height: 2.75em" onclick="deleteRow(this)">X</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-12-xsmall">
                    <input type="button" class="form-control btn btn-secondary" value="เพิ่มแถว" onclick="addInput()">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-12-xsmall">
                    <input type="submit" class="form-control btn btn-success" name="submit_save_donate_items" value="ยืนยัน" >
                </div>
            </div>
        </form>
    </div>
</div>