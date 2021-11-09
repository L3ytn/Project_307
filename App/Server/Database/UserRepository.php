<<?php 
	require_once "Database/DatabaseConnection.php";

	use database\DatabaseConnection;


	class UserRepository {
	private function __construct(){
		$this->database = new DatabaseConnection("localhost", "root", "","project_307");

		if (!$this->database->connect()) {
			die("Could not connect to database");
		}
	}
	/**This Function creates the User but if username is empty there's an error (401) and if the 
	 * username is to long the function returns a string that says the username is to long.
	 */

	public function createUser() {
		if (empty($_POST["username"])) {
			return array('error_code' => 401, "message"=> "Parameter username is required!" );
		}
		$username = $_POST["username"]

		if (strlen($username) > 50) {
			return "username is to long!";
		}
	}

}

 ?>