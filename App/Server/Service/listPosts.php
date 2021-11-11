<link rel="stylesheet" type="text/css" href="stylesheet.css">
<div class="post-list">
	<?php 

		require_once "App/Server/Database/PostRepository.php";

		$allPosts = PostRepository::getInstance()->getALLPosts();

		foreach ($allPosts as $post) {
			echo "<div class=\"post\">";
			echo "<h3>" . $post["title"] . "</h3>";
			echo '<img src="'. $post["imgpath"].'" /><br />';
			echo "</div>";
		}



 	?>
</div>