<?php include('header.php'); ?>

<div class="container">
<br>
<h1>Hello Dashboard!</h1>
<br>
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
			<?php foreach($articles as $article): ?>
			<tr>
				<th>1</th>
				<th><?php echo $article->title; ?></th>
				<th><a href="#" class="btn btn-primary">Edit</a></th>
				<th><a href="#" class="btn btn-danger">Delete</a></th>
			</tr>
			<?php endforeach; ?>
			<?php else:?>
			<tr>
				<th colspan="3">No Datta Available</th>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>

</div>

<?php include('footer.php'); ?>