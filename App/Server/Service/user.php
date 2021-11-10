<?php 
	require_once "../Database/UserRepository.php";
	session_set_cookie_params(0, '/');
	session_start();

	$userRepository = new UserRepository();


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$data = json_decode(file_get_contents("php://input"), true);
		$createUserResult = $userRepository->createUser($data);

		echo json_encode($createUserResult);
	}
 ?>