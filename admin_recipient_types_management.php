<?php include('db/DB_admin.php'); ?>

<h4 class="mt-4">Recipient Types Management</h4>
<form method="post" action="db/DB_admin_update.php" enctype="multipart/form-data">
    <div class="row gtr-uniform">
        <div class="col-12 col-12-xsmall">
            <label>Name of donor recipient</label>
            <input type="hidden" name="id" value="<?=(($rowOne["id"]) ? $rowOne["id"] : "" )?>">
            <input type="text" name="name" id="demo-username"  placeholder="Name of donor recipient " value="<?=(($rowOne["id"]) ? $rowOne["name"] : "" )?>" required />
        </div>
        <div class="col-4 col-12-xsmall">
            <ul class="actions">
            <?php if (isset($rowOne["id"])) { ?>
                <li><input type="submit" value="Update" class="btn btn-primary" name="update_recipient_types"/></li>
            <?php } else { ?>
                <li><input type="submit" value="Add" class="btn btn-success" name="add_recipient_types"/></li>
            <?php } ?>
                <li><input type="reset" value="reset" class="btn btn-secondary"/></li>
            </ul>
        </div>
    </div>
</form>
<div class="table-wrapper">
    <table id="datatable" class="table table-striped" style="width:100%;font-size: 13px;">
        <thead>
            <tr>
                <th>Name</th>
                <th class="text-center">Delete</th>
                <th class="text-center">Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php  while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?=$row["name"]?></td>
                <td class="text-center">
                    <a href="?page=admin_recipient_types_management&id=<?=$row["id"]?>"><i class="fa-solid fa fa-edit fa-xl text-primary"></i></a>
                </td>
                <td class="text-center">
                    <a href="db/DB_admin_update.php?delete_recipient_types=&id=<?=$row["id"]?>"><i class="fa-solid fa fa-trash fa-xl text-danger"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>