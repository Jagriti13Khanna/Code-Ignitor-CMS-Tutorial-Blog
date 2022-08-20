<style type="text/css">
  .form-container {
    width: 360px;
    margin: 0 auto;
}
.is-full-width{
  width: 100%;
}
</style>
<div class="container">
<h1 class="has-text-centered is-size-1"><?php echo lang('reset_password_heading');?></h1>
<div class="form-container">
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>

	<p class="my-3">
		<label for="new_password" class="label"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</p>

	<p class="my-3">
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<p class="my-3">
        <?php echo form_input($user_id);?>
    </p>

	<p class="my-3">
        <?php echo form_hidden($csrf); ?>
    </p>

	<p class="my-3">
        <?php echo form_submit('submit', lang('reset_password_submit_btn'),array('class'=>'button is-link is-full-width'));?>
    </p>

<?php echo form_close();?>
</div>
</div>