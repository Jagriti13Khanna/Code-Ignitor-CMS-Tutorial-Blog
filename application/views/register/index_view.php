<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
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
    <?php
    echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
    ?>
    <h1 class="has-text-centered is-size-1">Register</h1>
    
    <div class="form-container">
        <?php echo form_open(); ?>

        <p class="my-3">
            <?php echo form_label('First name:','first_name',array('class'=>'label')); ?>
            <?php echo form_error('first_name'); ?>
            <?php echo form_input('first_name',set_value('first_name'),array('class'=>'input')); ?>
        </p>

        <p class="my-3">
            <?php echo form_label('Last name:','last_name',array('class'=>'label')); ?>
            <?php echo form_error('last_name'); ?>
            <?php echo form_input('last_name',set_value('last_name'),array('class'=>'input')); ?>
        </p>

        <p class="my-3">
            <?php echo form_label('Username:','username',array('class'=>'label')); ?>
            <?php echo form_error('username'); ?>
            <?php echo form_input('username',set_value('username'),array('class'=>'input')); ?>
        </p>

        <p class="my-3">
            <?php echo form_label('Email:','email',array('class'=>'label')); ?>
            <?php echo form_error('email'); ?>
            <?php echo form_input('email',set_value('email'),array('class'=>'input')); ?>
        </p>

        <p class="my-3">
            <?php echo form_label('Password:', 'password',array('class'=>'label')); ?>
            <?php echo form_error('password'); ?>
            <?php echo form_password('password',set_value('password'),array('class'=>'input')); ?>
        </p>

        <p class="my-3">
            <?php echo form_label('Confirm password:', 'confirm_password',array('class'=>'label')); ?>
            <?php echo form_error('confirm_password'); ?>
            <?php echo form_password('confirm_password',set_value('confirm_password'),array('class'=>'input')).'<br/> <br/>'; ?>
        </p>

        <p class="my-3"><?php echo '<div class="has-text-centered">'.form_submit('register','Register',array('class'=>'button is-link is-full-width')).'</div>'; ?></p>

        <?php echo form_close(); ?>
    <br/>
    <br/>
    <br/>
</div>
</div>