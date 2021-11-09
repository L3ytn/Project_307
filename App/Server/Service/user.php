<<?php 
	session_set_cookie_params(0, '/');
	session_start();

	$userRepository = new UserRepository();


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$createUserResult = $userRepository->createUser();

		echo json_encode($createUserResult);
	}
 ?>