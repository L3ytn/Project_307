class AuthentificationViewController {
	static Initialize() {
		AuthentificationViewController.instance = new AuthentificationViewController();
	}

	constructor() {
		this.usernameText = document.getElementById("username-text");
		this.passwordText = document.getElementById("password-text");
		this.reTypePassword = document.getElementById("repeat-password-text");
		this.cancelButton = document.getElementById("cancel-button");
		this.signUpButton = document.getElementById("sign-up-button");

		this.cancelButton.addEventListener("click", this.onCancelButtonPress.bind(this));
		this.signUpButton.addEventListener("click", this.onSignUpButtonPress.bind(this));
	}

	onCancelButtonPress(event) {
		window.open("index.php", "_self");
	}

	onSignUpButtonPress(event) {
		event.preventDefault();
		var usernameText = this.usernameText.value;
		var passwordText = this.passwordText.value;
		var reTypePassword = this.reTypePassword.value;

		var requestData = {
			username: usernameText,
			password: passwordText,
			reTypePassword: reTypePassword

		};

		this.loadTextRequest = new XMLHttpRequest();
		this.loadTextRequest.onreadystatechanged = this.onTextLoaded.bind(this);
		this.loadTextRequest.open("POST", "App/Server/Service/user.php");
		this.loadTextRequest.send(JSON.stringify(requestData));
		}

	onTextLoaded(event) {
		if (this.laodTextRequest.readystate < 4) {
			return;
		}

		var responseData = JSON.parse(this.laodTextRequest.responseText);
		this.textContainer.innerText = responseData.text;
	}
}
window.addEventListener("load", AuthentificationViewController.Initialize);