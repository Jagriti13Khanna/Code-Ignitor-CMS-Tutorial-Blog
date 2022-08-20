<style type="text/css">
	.tutorial-single p, h2 {
        padding: 15px 0;
    }

    .image.is-5by4 {
        padding-top: 0;
    }
</style>
<div class="container my-6">
	<div class="tutorial-single">
		<div class="is-flex is-justify-content-space-between is-align-items-baseline">
            <h2 class="is-size-2 is-uppercase has-text-weight-bold"><?php echo $tutorial->title; ?></h2>
                    <?php if ($this->ion_auth->logged_in() && $this->tutorial_model->is_owner($tutorial->id_tutorial,$this->ion_auth->get_user_id())) { ?> 
                    <span class="seperator"></span>
                    <p class="has-text-right"><a href="<?php echo base_url().'tutorials/edit/'.$tutorial->id_tutorial; ?>">EDIT</a> | <a href="<?php echo base_url().'tutorials/delete/'.$tutorial->id_tutorial; ?>">DELETE</a></p>
                    <?php } ?>
        </div>
        <hr>

        <h3 class="is-size-4 mt-5 is-underlined">About this tutorial</h3>
		<p><?php echo $tutorial->about; ?></p>

        <h3 class="is-size-4 mt-5 is-underlined">What you will learn?</h3>
        <p><?php echo $tutorial->what_you_learn; ?></p>
        
        <hr>

        <h3 class="is-size-4 mt-5 is-underlined">Let's get started!</h3>
        
        <div class="my-6">
            <h4 class="is-size-5 mt-5 has-text-weight-semibold">Step 1:</h4>        
            <p><?php echo htmlspecialchars($tutorial->step1); ?></p>
            <img width="600" height="480" class="image is-5by4" src="<?php echo base_url().'uploads/'.$tutorial->step1_image; ?>">
        </div>
        
        <div class="my-6">
            <h4 class="is-size-5 mt-5 has-text-weight-semibold">Step 2:</h4>
            <p><?php echo htmlspecialchars($tutorial->step2); ?></p>
            <img width="600" height="480" class="image is-5by4" src="<?php echo base_url().'uploads/'.$tutorial->step2_image; ?>">
        </div>
        
        <div class="my-6">
            <h4 class="is-size-5 mt-5 has-text-weight-semibold">Step 3:</h4>
            <p><?php echo htmlspecialchars($tutorial->step3); ?></p>
            <img width="600" height="480" class="image is-5by4" src="<?php echo base_url().'uploads/'.$tutorial->step3_image; ?>">
        </div>
        
        <?php if("$tutorial->step4"): ?>
        <div class="my-6">
            <h4 class="is-size-5 mt-5 has-text-weight-semibold">Step 4:</h4>
            <p><?php echo htmlspecialchars($tutorial->step4); ?></p>        
            <img width="600" height="480" class="image is-5by4" src="<?php echo base_url().'uploads/'.$tutorial->step4_image; ?>">
        </div>
        <?php endif; ?>

        <?php if("$tutorial->step5"): ?>
        <div class="my-6">
            <h4 class="is-size-5 mt-5 has-text-weight-semibold">Step 5:</h4>		
            <p><?php echo htmlspecialchars($tutorial->step5); ?></p>
            <img width="600" height="480" class="image is-5by4" src="<?php echo base_url().'uploads/'.$tutorial->step5_image; ?>">
        </div>
        <?php endif; ?>  
        
        <div class="content has-text-centered has-text-grey-light">
            <p>----------XXXXX----------</p>
        </div>
        
	</div>


</div>