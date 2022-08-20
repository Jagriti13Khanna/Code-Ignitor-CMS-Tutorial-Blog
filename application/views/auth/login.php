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
<h1 class="has-text-centered is-size-1"><?php echo lang('login_heading');?></h1>
<p class="has-text-centered mt-2 mb-6"><?php echo lang('login_subheading');?></p>
<div class="form-container">
<div id="infoMessage"><?php echo $message;?></div>


<?php echo form_open("auth/login");?>
  <p class="my-3">
    <?php echo form_label('Email/Username','identity',array('class'=>'label'));?>
    <?php echo form_input($identity);?>
  </p>

  <p class="my-3">
    <?php echo form_label('Password','password',array('class'=>'label'));?>
    <?php echo form_input($password);?>
  </p>

  <p class="my-3">
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>

  <br/>
  <p class="my-3 has-text-centered"><?php echo form_submit('submit', lang('login_submit_btn'),array('class'=>'button is-link is-full-width'));?></p>

<?php echo form_close();?>

<p class="mt-5"><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>
</div>