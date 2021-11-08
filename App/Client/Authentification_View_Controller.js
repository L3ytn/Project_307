class AuthentificationViewController {
	static Initialize() {
		AuthentificationViewController.instance = new AuthentificationViewController();
	}

	constructor() {
		this.usernameText = document.getElementById("username-text");
		this.passwordText = document.getElementById("password_text");
		this.reTypePassword = document.getElementById("repeat-password-text");

		this.cancelButton.addEventListener("click", this.onSignUpButtonPress.bind(this));
	}

	onSignUpButtonPress(event) {
		this.loadTextRequest = new XMLHttpRequest();
		this.loadTextRequest.onreadystatechanged = this.loadTextRequest.bind(this);
	}

	onTextLoaded(event) {
		if (this.laodTextRequest.readystate < 4) {
			return;
		}
		
		var responseData = JSON.parse(this.laodTextRequest.responseText);
		this.textContainer.innerText = responseData.text;
	}
}
window.addEventListener("load", MainController.initialize);