<!-- views/home_detail_view.php  -->
<style type="text/css">
    .whatever {
    margin: 20px;
    padding: 10px;
    border: 1px solid silver;
}
</style>
<div class="container">
<h1><?php echo $heading?></h1> 

<?php if(($results)) : ?> 
    <?php foreach($results as $row): ?> 
        <div class="whatever content is-medium"> 
            <h2><?php echo $row->title ?></h2>
            <img src="<?php echo base_url().'uploads/'.(empty($row->image) ? 'no-image.png' : $row->image ) ; ?>">
            <p><?php echo $row->description ?></p> 
            <p><?php echo $row->timedate ?></p>
            <div class="is-flex is-justify-content-flex-end">
            <?php if ($this->ion_auth->logged_in() && $this->home_model->check_owner($row->article_id,$this->ion_auth->get_user_id())) { ?> 
                    <?php 
                        $user_id = $this->ion_auth->user()->row()->id ; 
                        $first_name = $this->ion_auth->user()->row()->first_name ; 
                    ?>
                <p class="mr-5"><a class="button is-success" href="<?php echo base_url() ."home/edit/" .$row->article_id;?>" class="btn btn-primary btn-sm">Edit</a> 
                 <a class="button is-danger" href="<?php echo base_url() ."home/delete/" .$row->article_id;?>" class="btn btn-danger btn-sm">Delete</a></p>
                <?php } else { ?>
                    <p>Sorry! This is not your article.</p>
                <?php } ?> 
               
            </div>
        </div> 
    <?php endforeach;?> 
<?php else:?> 
    <p>No results</p> 
<?php endif; ?>
</div>