<!-- views/home_read_view.php  -->
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
        	<div class="columns">
        		<div class="column is-one-quarter">
        			<img src="<?php echo base_url().'uploads/thumbnail/'.(empty($row->image) ? 'no-image.png' : $row->image ) ; ?>">
        		</div>
        		<div class="column">
	        		<h2><?php echo $row->title ?></h2> 
	        		<p><?php echo $row->description ?></p> 
	        		<p><?php echo $row->username ?></p>
	            	<p class="mr-5"><a href="<?php echo base_url()?>home/detail/<?php echo $row->article_id ?>" class="btn btn-info">Read more...</a></p>
            	</div>
            </div>
        </div> 
    <?php endforeach;?> 
<?php endif; ?>
</div>