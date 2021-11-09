<!DOCTYPE html>
<html>
<head>
	<script src="App/Client/AuthentificationViewController.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Sign-up</h1>
	<p>Filling in the form will create an account!</p>

	<label for="username">Username</b></label>
	<input type="text" placeholder="Username" id="username-text" required="True" maxlength="50">

	<label for="psw">Password(minimum 9 Letter's)</b></label>
	<input type="password" placeholder="Password(minimum 9 Letter's)" id="password-text" required="True" minlength="9">

	<label for="repeat-password">Re-Type Password</b></label>
	<input type="password" placeholder="Repeat Password" id="repeat-password-text" required="True">


	<button id="cancel-button">Cancel</button>
	<button id="sign-up-button">Sign-up</button>

</body>
</html>