<?php include( 'header.php' ); ?>
	
	<br>


	<div class = "container">
		<h2>Edit Article Here</h2><br>

		<form action="<?php echo base_url() ?>admin/updatearticle/<?php echo $article->id ?>" method="post">



			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
					   <label for="title">Title</label>
					   <input type="text" name="title"  class="form-control" value="<?php echo set_value('title',$article->title); ?>" id="title" placeholder="Enter Title">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
				<p><?php echo form_error('title',"<div class='text-danger'>","</div>"); ?></p>
				</div>
			</div>
           
           <div class="row">
				<div class="col-lg-6">
		           <div class="form-group">
		              <label for="body">Description</label>
		               <textarea type="textarea" class="form-control" placeholder="Description" name="body" value="<?php echo set_value('body'); ?>" ><?php echo $article->body; ?></textarea>
		           </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
				<p><?php echo form_error('body',"<div class='text-danger'>","</div>"); ?> </p>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
            		<button type="submit" class="btn btn-primary">Edit</button>
           		</div>
			</div>

        </form>
		                 

	</div>

<?php include( 'footer.php' ); ?>