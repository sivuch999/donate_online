<form method="get" action="">
    <input type="hidden" name="page" value="searching_user">
    <div class="row gtr-uniform">
        <div class="col-md-7 col-12-xsmall">
            <!-- <label>Name of donor recipient</label>
            <input
                type="text"
                name="donorname"
                id="demo-name"
                placeholder="Empty is all"
                value="<?=((isset($_GET["donorname"])) ? $_GET["donorname"] : "") ?>"
            /> -->

            <label for="demo-copy4">Name of donor recipient (Not checking means selecting all)</label>
            <select class="form-select" id="multiple-select-field" name="user_id[]" data-placeholder="Choose anything" multiple>
            <?php  $i=0; while ($row = mysqli_fetch_assoc($resultUsers)) {  ?>
                <?php
                    $selected = "";
                    if (isset($_GET["user_id"])) {
                        if (in_array($row["id"], $_GET["user_id"])) {
                            $selected = "selected";
                        }
                    }	
                ?>
                <option value="<?=$row["id"]?>" <?=$selected?>><?=$row["donorname"]?></option>
            <?php $i++; } ?>
            </select>

        </div>
        <div class="col-md-5 col-12-xsmall">
            <label>Type of donor recipient</label>
            <select id="demo-category2" name="donor_recipient_type_id">
                <option value="">- All -</option>
            <?php while ($row = mysqli_fetch_assoc($resultGetDonorRecipientTypes)) { ?>
                <option
                    value="<?=$row["id"] ?>" 
                    <?=((isset($_GET["donor_recipient_type_id"]) && $_GET["donor_recipient_type_id"] == $row["id"]) ? "selected" : "") ?>
                >
                    <?=$row["name"]?>
                </option>
            <?php } ?>
            </select>
        </div>
        <!-- <div class="col-md-12 col-12-xsmall">
            <label>Location</label>
            <input
                type="text"
                name="location"
                id="demo-name"
                placeholder="Empty is all"
                value="<?=((isset($_GET["location"])) ? $_GET["location"] : "") ?>"
            />
        </div> -->
        <!-- <div class="col-md-12 col-12-small">
            <label for="demo-copy4">Identify what type of goods that you want to donate (Not checking means selecting all)</label>
            <select class="form-select" id="multiple-select-field" name="donate_type_id[]" data-placeholder="Choose anything" multiple>
            <?php 
                // $i=0; while ($row = mysqli_fetch_assoc($resultDonateTypes)) { 
            ?>
                <?php
                    // $selected = "";
                    // if (isset($_GET["donate_type_id"])) {
                    //     if (in_array($row["id"], $_GET["donate_type_id"])) {
                    //         $selected = "selected";
                    //     }
                    // }	
                ?>
                <option value="<?=$row["id"]?>" <?=$selected?>><?=$row["name"]?></option>
            <?php
                // $i++; }
            ?>
            </select>
        </div> -->
        <div class="col-md-12">
            <input type="submit" class="btn btn-success form-control" name="submit" value="search"/>
        </div>
    </div>
</form>
<hr/>
<div class="container-fluid">
    <div class="row">
    <?php if (isset($resultGetUser)) { ?>
        <?php $conditionGetUser; while ($row = mysqli_fetch_assoc($resultGetUser)) { $subtitles = $row["subtitles"]?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body" style="overflow: hidden;">
                        <label class="card-title"><?=$row["donorname"]?></label>
                        <p class="card-subtitle mb-2 text-muted" style="font-size: 0.5rem;"><?=$row["donor_recipient_types_name"]?></p>
                        <p class="card-subtitle mb-2 text-muted inline-overflow-wrap" style="font-size: 0.5rem;"><b>Want: </b><?=$row["donate_types_name"]?></p>
                        <p class="card-subtitle mb-2 text-muted inline-overflow-wrap" style="font-size: 0.5rem;"><b>Contact: </b><?=$row["contact"]?></p>
                        <hr/>
                        <p class="card-text overflow-scroll" style="height: 10rem"><?=$subtitles?></p>
                    </div>
                    <div class="card-body ">
                        <div class="list-group list-group-flush" >
                            <a href="show_event.php?user_id=<?=$row["id"]?>"><button class="btn btn-dark form-control">View</button></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    </div>
</div>