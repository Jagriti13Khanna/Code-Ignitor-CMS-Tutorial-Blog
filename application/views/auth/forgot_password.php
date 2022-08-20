<style type="text/css">
  .form-container {
    width: 360px;
    margin: 0 auto;
}
.is-full-width{
  width: 100%;
}
</style>
<div class="container  my-6">
<h1 class="has-text-centered is-size-1"><?php echo lang('forgot_password_heading');?></h1>
<p class="has-text-centered mt-2 mb-6"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div class="form-container">

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p class="my-3">
      	<label for="identity" class="label"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity);?>
      </p>

      <p class="my-3"><?php echo form_submit('submit', lang('forgot_password_submit_btn'),array('class'=>'button is-link is-full-width'));?></p>

<?php echo form_close();?>
</div>
</div>