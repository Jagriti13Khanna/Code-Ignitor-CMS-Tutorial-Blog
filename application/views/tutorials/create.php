<div class="container my-6">
    <h1 class="has-text-centered title is-1">New Tutorial</h1>
    <?php echo form_open_multipart('tutorials/write'); ?>
    <div class="columns">
        <div class="column">
            <div class="my-6">
                <div class="form-group">
                    <label for="title" class="label">Title</label>
                    <input type="text" name="title" class="input" value="<?php echo set_value('title'); ?>" />
                    <?php echo form_error('title'); ?>
                </div>
            </div>
            <div class="my-6">
                <div class="form-group">
                    <label for="about" class="label">About</label>
                    <textarea name="about" class="textarea"><?php echo set_value('about'); ?></textarea>
                    <?php echo form_error('about'); ?>
                </div>
            </div>
            <div class="my-6">
                <div class="form-group">
                    <label for="title" class="label">What you will learn</label>
                    <input type="text" name="what_you_learn" class="input" value="<?php echo set_value('what_you_learn'); ?>" />
                    <?php echo form_error('what_you_learn'); ?>
                </div>
            </div>
            <div class="my-6">
                <div class="form-group">
                    <label for="step1" class="label">Step 1</label>
                    <textarea name="step1" class="textarea"><?php echo set_value('step1'); ?></textarea>
                </div>
                <?php echo form_error('step1'); ?>
                <div class="form-group">
                  <label class="label">Step 1 image</label>
                  <input type="file" name="step1_image" size="20" required>
                </div>
                <?php echo form_error('step1_image'); ?>
            </div>
        <div>
            <div class="form-group">
                <label for="step2" class="label">Step 2</label>
                <textarea name="step2" class="textarea"><?php echo set_value('step2'); ?></textarea>            
            </div>
            <?php echo form_error('step2'); ?> 
            <div class="form-group">
                  <label class="label">Step 2 image</label>
                  <input type="file" name="step2_image" size="20" required>
            </div>
            <?php echo form_error('step2_image'); ?> 
        </div>
    </div>
    <div class="column ml-4">         
        <div class="my-6">
            <div class="form-group">
                <label for="step3" class="label">Step 3</label>
                <textarea name="step3" class="textarea"><?php echo set_value('step3'); ?></textarea>
            </div>
            <?php echo form_error('step3'); ?>
             <div class="form-group">
                  <label class="label">Step 3 image</label>
                  <input type="file" name="step3_image" size="20" required>
            </div>
            <?php echo form_error('step3_image'); ?>
        </div>
        <div class="my-6">
            <div class="form-group">
                <label for="step4" class="label">Step 4 (not required)</label>
                <textarea name="step4" class="textarea"><?php echo set_value('step4'); ?></textarea>
            </div>
             <div class="form-group">
                  <label class="label">Step 4 image</label>
                  <input type="file" name="step4_image" size="20">
            </div>
            <?php echo form_error('step4'); ?>
        </div>
        <div class="my-6">
            <div class="form-group">
                <label for="step5" class="label">Step 5 (not required)</label>
                <textarea name="step5" class="textarea"><?php echo set_value('step5'); ?></textarea>
            </div>
             <div class="form-group">
                  <label class="label">Step 5 image</label>
                  <input type="file" name="step5_image" size="20">
            </div>
            <?php echo form_error('step5'); ?>
        </div>
         
        
    </div> 
</div>
    <div class="has-text-centered">
             <input type="submit" class="button is-link" style="width:300px" value="Submit" class="btn" />
        </div>
    </form>
</div>