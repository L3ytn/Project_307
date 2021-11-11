<?php 
		
	require_once "DatabaseConnection.php";

	use database\DatabaseConnection;

	class PostRepository {
	public function __construct(){
		$this->database = new DatabaseConnection("localhost", "root", "","project_307");

		if (!$this->database->connect()) {
			die("Could not connect to database");
		}
	}

		public function getALLPosts() {
			//fetch all posts from the database.
			$result = $this->database->query("SELECT * FROM posts ORDER BY created_at DESC");
			$resultArray = $this->database->toArray($result);
			return $resultArray;

		}
		public function createPost($postData)	{
			if (!isset($postData["title"]) || empty($postData["title"])) {
				return "Please write a title";
			}
			$title = $postData["title"];

			if (strlen($title) > 500) {
				return "title is to long!";
			}
			//Validate license
			$allowedLicenses = array("all-rights-reserved", "cc0", "cc-by", "cc-by-sa", "cc-by-nc", "cc-by-nc-sa", "cc-by-nd", "cc-by-nc-nd");
			if (!isset($postData["license"]) || !in_array($postData["license"], $allowedLicenses)) {
				return"Please set a license.";			
			}

			$license = $postData["license"];

			//validate and upload files
			if (!isset($postData["image"])) {
				return "You must upload an image file.";
			}

			$imageUrl = $postData["image"];
/*
			//Checking if a File is to big, if so tell the user that the file is to big
			$tempPath = $postData["image"]["tmp_name"];
			var_dump($postData["Image"]);
			if ($postData["Image"]["size"] > 20000000000000) {
				return "The uploaded file is too big";
			}
			//Allowed Types of Pictures
			$allowedTypes = array("image/png", "image/webp", "image/jpeg");
			$fileinfo = new finfo();
			$mimeType = $fileinfo->file($tempPath, FILEINFO_MIME_TYPE);
			echo $mimeType;
			if (!in_array($mimeType, $allowedTypes)) {
				return "The file must be a PNG, Jpeg or a WEBP file!";
			}

			//Make sure the upload directory exists.
			$uploadDirectory = "Posts" . DIRECTORY_SEPARATOR . date("Y.m.d");
			if (!file_exists($uploadDirectory)) {
				mkdir($uploadDirectory, 0777, true);
			}

			$fileDestination = $uploadDirectory . DIRECTORY_SEPARATOR . microtime() . ".". strtolower(pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION));

			//Move the uploaded Image to the upload directory
			if (!move_uploaded_file($tempPath, $fileDestination)) {
				return "An error ocurred while saving the image. Please try again later.";
			}

			$thumnailPath = $this->generateThumbnail($fileDestination);
*/
			$result = $this->database->query("INSERT INTO post(title, copyright, img_path) VALUES (?,?,?)", array($title, $license, $imageUrl), array("s", "s", "s"));
			echo $this->database->getError();


			if ($result !== true) {
				return "Please provide user token";
			}

			return $this->database->getInsertedId();
	}
	private function generateThumbnail($imaegPath) {
		$imageData = getimagesize($imaegPath);
		$width = $imageData[0];
		$height = $imageData[1];
		$imageType = $imageData[2];

		if ($width <=128) {
			return $imaegPath;
		}
		else if ($imageType == IMAGETYPE_PNG) {
			$image = imagecreatefrompng($imaegPath);
		}
		else if ($imageType == IMAGETYPE_WEBP) {
			$image = imagecreatefromwebp($imaegPath);
		}
		else if ($imageType == IMAGETYPE_JPEG) {
			$image = imagecreatefromjpeg($imaegPath);
		}
		else {
			return $imaegPath;
		}
		$image = imagescale($image, 120);

		$pathinfo = pathinfo($imaegPath);
		$thumbnailPath = $pathinfo["dirname"] . DIRECTORY_SEPARATOR . $pathinfo["filename"] . " (Thumbnail)." . $pathinfo["extension"];

		if ($imageType == IMAGETYPE_PNG) {
			imagepng($image, $thumbnailPath);
		}

		return $thumbnailPath;
	}
}

?>