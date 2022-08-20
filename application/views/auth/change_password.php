<style type="text/css">
  .form-container {
    width: 360px;
    margin: 0 auto;
}
.is-full-width{
  width: 100%;
}
</style>
<div class="container my-6">
<h1 class="has-text-centered is-size-1"><?php echo lang('change_password_heading');?></h1>

<div class="form-container has-text-centered">
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/change_password");?>

      <p class="my-3">
            <label class="label"><?php echo lang('change_password_old_password_label', 'old_password');?></label> 
            <?php echo form_input($old_password);?>
      </p>

      <p class="my-3">
            <label for="new_password" class="label"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
            <?php echo form_input($new_password);?>
      </p>

      <p class="my-3">
            <label class="label"><?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?></label>
            <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
      <p class="my-3"><?php echo '<div class="has-text-centered">'. form_submit('submit', lang('change_password_submit_btn'),array('class'=>'button is-link is-full-width')).'</div>'; ?></p>

<?php echo form_close();?>
<br/>
    <br/>
    <br/>
</div>
</div>