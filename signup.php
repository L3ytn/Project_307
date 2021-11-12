<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
	<script src="App/Client/AuthentificationViewController.js"></script>
	<link rel="stylesheet" type="text/css" href="signupstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
	<div class="topnav">
		<a class="active" href="index.php"><img src="IMG/P&P.png"/a>
			<div class="nav-container">
				<a href="index.php">Home</a>
		  		<a href="rules.php">Rules</a>
		  		<a href="about.php">About</a>
		  		<a href="login.php">Log-in</a>
		  		<a href="signup.php">Sign-up</a>
		  	</div>
	</div>
		<div class="form-container">
			<div class="form-user">
				<h1>Sign-up</h1>
				<p>Filling in the form will create an account!</p>

				<table>
					<tr>
						<td>
							<label for="username">Username</b></label>
						</td>
						<td>				
							<input type="text" placeholder="Username" id="username-text" required="True" maxlength="50">
						</td>
					</tr>
					<tr>
						<td>
							<label for="psw">Password(minimum 9 Letter's)</b></label>
						</td>
						<td>				
							<input type="password" placeholder="Password(minimum 9 Letter's)" id="password-text" required="True" minlength="6">
						</td>
					</tr>
					<tr>
						<td>
							<label for="repeat-password">Re-Type Password</b></label>
						</td>
						<td>				
							<input type="password" placeholder="Repeat Password" id="repeat-password-text" required="True">
						</td>
					</tr>
				</table>
				<button id="cancel-button">Cancel</button>
				<button id="sign-up-button">Sign-up</button>
			</div>
		</div>
</body>
</html>