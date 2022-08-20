 <style type="text/css">
 	.card-container {/* display: flex; *//* flex-direction: column; */
  /* justify-content: flex-start; */
  /* flex-wrap: wrap; */padding: 50px;}
	.card-layout {width: 46%;border: 1px solid #dfdfdf;float: left;margin: 20px;}
	.card-container:after,.card-container:before {
    content: '';
    display: table;
    clear: both;
}
span.seperator {
    border-top: 1px solid #dfdfdf;
    display: block;
    margin: 10px 0;
}
.card-layout h2,.card-layout p {
    padding: 8px 18px;
}
 </style>

 <div class="container my-6">
 	<div class="card-container">
	<?php
		if(!empty($tutorials)){
		foreach ($tutorials as $tutorial) { ?>
			<div class="card-layout"> 
				<img src="<?php echo base_url(). 'uploads/thumbnail/'.$tutorial->step1_image; ?>">
				<h2 class="is-size-2"><?php echo $tutorial->title; ?></h2>

				<span class="seperator"></span>

				<p>Author: <?php echo $tutorial->first_name . ' at '. date('d/m/Y H:i',strtotime($tutorial->date));  ?></p>				
				
				<p><?php echo substr($tutorial->what_you_learn, 0, 151); ?>...</p>

				<p class="has-text-right"><a class="button is-link" href="<?php echo base_url().'tutorials/detail/'.$tutorial->id_tutorial; ?>">Start the tutorial -></a></p>
				<?php if ($this->ion_auth->logged_in() && $this->tutorial_model->is_owner($tutorial->id_tutorial,$this->ion_auth->get_user_id())) { ?> 

				<span class="seperator"></span>
				<p class="has-text-right"><a href="<?php echo base_url().'tutorials/edit/'.$tutorial->id_tutorial; ?>">EDIT</a> | <a href="<?php echo base_url().'tutorials/delete/'.$tutorial->id_tutorial; ?>">DELETE</a></p>
			<?php } ?>
			</div>
	<?php } ?>
	<?php }else{ ?>
		<h2>No tutorials found !</h2>
	<?php } ?>
	</div>
</div>