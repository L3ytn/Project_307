<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

?>

<!DOCTYPE html>
<html>
<head>
	<script src="lazyLoading.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>
	<div class="topnav">
		<a class="active" href="index.php"><img src=""/a>
  		<a href="index.php">Home</a>
  		<a href="rules.php">Rules</a>
  		<a href="about.php">About</a>
  		<a href="login.php">Log-in</a>
  		<a href="signup.php">Sign-up</a>
	</div>







		<?php
		if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || preg_match('~Trident/7.0(; Touch)?; rv:11.0~', $_SERVER['HTTP_USER_AGENT'])) {
			echo "<h1>This website does not support Internet Explorer. It's time to move on and install a newer browser.</h1>";
			echo "<p><a href=\"https://www.google.com/chrome/\">Get Google Chrome</a></p>";
			echo "<p><a href=\"https://www.mozilla.org/firefox/new/\">Get Mozilla Firefox</a></p>";
			die;
		}
		?>
</body>
</html>