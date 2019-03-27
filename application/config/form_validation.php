<?php 
	
	$config = [

		'add_article_rules' => [

			[
			'field' => 'title',
			'label' => 'Article Title',
			'rules' => 'required|alpha'
			],

			[
			'field' => 'body',//actually name of html
			'label' => 'Article Title',//error field will use this  
			'rules' => 'required|alpha'
			],


		]

	]

?>