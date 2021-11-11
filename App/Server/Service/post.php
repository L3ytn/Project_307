<?php 
	require_once "../Database/PostRepository.php";
	session_set_cookie_params(0, '/');
	session_start();

	$postRepository = new PostRepository();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$postData = json_decode(file_get_contents("php://input"), true);
		$createPostResult = $postRepository->createPost($postData);

	echo json_encode($createPostResult);
	}
 ?>

