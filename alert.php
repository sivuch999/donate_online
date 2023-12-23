<?php if (isset($_SESSION["alert_success"]) && time() < $_SESSION["alert_success"]) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
        Successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow: inset 0 0 0 0px;"></button>
    </div>
<?php } ?>

<?php if (isset($_SESSION["alert_fail"]) && time() < $_SESSION["alert_fail"]) {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
        <?php echo ((isset($_SESSION["alert_msg"]) && !empty($_SESSION["alert_msg"]) ? $_SESSION["alert_msg"] : "An error occurred!! Please try again")) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow: inset 0 0 0 0px;"></button>
    </div>
<?php } ?>

<script>
    // const AlertActive = (element) => {
    //     var classElement = document.getElementsByClassName(element);
    //     classElement.classList.remove("hidden");
    //     setTimeout(function(){
    //         var bsAlert = new bootstrap.Alert(element);
    //         bsAlert.close();
    //     }, 3000)
    // }

    // const AlertHidden = (element) => {
    //     var classElement = document.getElementsByClassName(element);
    //     classElement.classList.add("hidden");
    //     setTimeout(function(){
    //         var bsAlert = new bootstrap.Alert(element);
    //         bsAlert.close();
    //     }, 3000)
    // }
</script>