<?php 
	require_once "../Database/DatabaseConnection.php";

	use database\DatabaseConnection;


	class UserRepository {
	public function __construct(){
		$this->database = new DatabaseConnection("localhost", "root", "","project_307");

		if (!$this->database->connect()) {
			die("Could not connect to database");
		}
	}
	/**This Function creates the User but if username is empty there's an error (401) and if the 
	 * username is to long the function returns a string that says the username is to long.
	 */

	public function createUser($data) {
		if (empty($data["username"])) {
			return array('error_code' => 401, "message"=> "Parameter username is required!" );
		}
		$username = $data["username"];

		if (strlen($username) > 50) {
			return "username is to long!";
		}
		if (empty($data["password"])) {
			return array("error_code" => 401, "message"=> "Parameter password is required!");
		}
		$password = $data["password"];

		if (strlen($password) < 9) {
			return "password is to short!";
		}
		$not_safe = file_get_contents("../../config/MostUsedPasswords.txt", null);


		if (strpos($not_safe, $password) !== false) {
			return "The Password is not safe to use!";
		}
		$reType = $data["reTypePassword"];


		if ($reType != $password) {
			return "The Passwords are not the same!";
		}

		$result = $this->database->query("INSERT INTO user(username, password) VALUES (?,?)", array($username, $password), array("s", "s"));

			if ($result !== true) {
				return "Please provide user token";
			}

			return $this->database->getInsertedId();
	}

}

?>