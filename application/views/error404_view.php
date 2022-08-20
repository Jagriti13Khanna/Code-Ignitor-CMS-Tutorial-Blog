<!-- views/error404_view.php --> 
<h2><?php echo $heading; ?></h2> <!-- each array item in the controller become a PHP variable in the view--> 
<div class="whatever d-flex">
    <div><?php echo $message; ?></div>
    <img src="<?php echo base_url() . $picture; ?>" alt="">
</div>