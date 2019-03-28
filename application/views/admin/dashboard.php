<?php include('header.php'); ?>

<div class="container">
<br>
<h1 class="col-md-9 offset-3">Hello Dashboard!</h1>

<div class = "row">
	<div class="col-md-9 offset-5">
		<a href="<?= base_url('admin/addarticle') ?>" class="btn btn-success float-left">Add Article</a>
	</div>

</div>

<?php if($article_msg = $this->session->flashdata('msg')): ?>
<br>
<div class="row">
	<div class='<?php echo $this->session->flashdata('msg_class'); ?>'>
		<?php echo $article_msg; ?>
	</div>
</div>

<br>
<?php endif; ?>
<br>


<br>
<div class="row">
<div class="table">
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if( count($articles) ): ?>
			<?php $cnt = 0; foreach($articles as $article): ?>
			<tr>
				<th><?php echo $article->id; ?></th>
				<th><?php echo $article->title; ?></th>

				<th><?=  anchor("admin/editarticle/{$article->id}",'Edit',['class'=>'btn btn-primary']);  ?></th>

				<th>
				<form action="<?php echo base_url('admin/deletearticle'); ?>" method="post">
				  
				  <?php echo form_hidden('id',$article->id); ?>
				  <button class="btn btn-danger">Delete</button>

				</form>
			   </th>

			</tr>
			<?php endforeach; ?>
			<?php else:?>
			<tr>
				<th colspan="3">No Datta Available</th>
			</tr>
			<?php endif; ?>
		</tbody>


	</table>

	<?= $this->pagination->create_links(); ?>

</div>
</div>
</div>

<?php include('footer.php'); ?>