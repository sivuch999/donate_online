<?php
    
    if (isset($_POST['view_picture'])){

        $picture=$_POST['picture'];
        echo '<div class="col-12"><span class="image fit"><img src="image_evd/' . $picture . '" alt=""/></span></div>';

    }
    else{
        echo '<div class="col-12"><span class="image fit"><img src="images/banner.jpg" alt="" /></span></div>';
    }
?>