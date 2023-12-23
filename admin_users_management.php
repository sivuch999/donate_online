<?php include('db/DB_admin.php'); ?>

<h4 class="mt-4">Users Management</h4>
<form method="get" action="">
    <input type="hidden" name="page" value="admin_users_management">
    <div class="col-12">
        <label>Please Select User Status</label>
        <select name="show" onchange="this.form.submit()">
            <option value="show_all" <?php echo ($_GET["show"] == "show_all" || !isset($_GET["show"])) ? "selected" : "" ?> >Show All Member</option>
            <option value="show_0" <?php echo ($_GET["show"] == "show_0") ? "selected" : "" ?> >Show Only 0 Member</option>
            <option value="show_1" <?php echo ($_GET["show"] == "show_1") ? "selected" : "" ?> >Show Only 1 Member</option>
        </select>
    </div>
</form>
<hr>
<div class="table-wrapper">
    <table id="datatable" class="table table-striped" style="width:100%;font-size: 13px;">
        <thead>
            <tr>
                <th class="text-center">Username</th>
                <th class="text-center">Fullname</th>
                <th class="text-center">Description</th>
                <th class="text-center">Type</th>
                <th class="text-center">Location</th>
                <th class="text-center">Status</th>
                <th class="text-center">File</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while ($row = mysqli_fetch_assoc($result)) {
                    $subtitles = substr($row["subtitles"], 0, 50); // ตัดที่ 50 คำ
                    $subtitles = ((strlen($subtitles) >= 30) ? "$subtitles..." : $subtitles );
            ?>
                    <tr>
                        <td class="text-center"><?=$row["username"]?></td>
                        <td class="text-center"><?=$row["firstname"]." ".$row["lastname"]?></td>
                        <td class="text-center"><?=$subtitles?></td>
                        <td class="text-center"><?=$row["donor_recipient_type_name"]?></td>
                        <td class="text-center"><?=$row["location"]?></td>
                        <td class="text-center">
                            <div class="form-check form-switch" style="padding-left: 1.4em;">
                                <label>
                                    <a href="db/DB_admin_update.php?trigger_status_users=&id=<?=$row["id"]?>">
                                        <input class="form-check-input" type="checkbox" <?=($row["status"] == "1" ? "checked" : "")?>>
                                        <label></label>
                                    </a>
                                </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <a target="_blank" href="image_evd/<?=$row["picture"]?>"><i class="fa-solid fa-file fa-xl"></i></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>