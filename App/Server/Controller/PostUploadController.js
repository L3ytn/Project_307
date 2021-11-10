class PostUploadController {
	static nitialize() {
		PostUploadController.instance = new PostUploadController();
	}

	constructor() {
		this.titleText = document.getElementById("title-text");
		this.descriptionText = document.getElementById("description-text");
		this.licenseSelect = document.getElementById("license-select");
		this.uploadModal = document.getElementById("upload-modal");

		this.uploadPictureButton.addEventListener("click" this onUploadButtonPress.bind(this))
		this.cancelButton.addEventListener("click", this.onCancelButtonPress.bind(this));
		this.uploadButton.addEventListener("click", this.onUploadButtonPress.bind(this));
	}

	onUploadButtonPress(event) {
		event.preventDefault();
		var titleText = this.titleText.value;
		var descriptionText = this.descriptionText.value;
		var licenseSelect = this.licenseSelect.value;

		var requestData = {
			title: titleText,
			description: descriptionText,
			text: licenseSelect	
		};

		this.loadTextRequest = new XMLHttpRequest();
		this.loadTextRequest.onreadystatechanged = this.onTextLoaded.bind(this);
		this.loadTextRequest.open("POST", "App/Server/Service/post.php");
		this.loadTextRequest.send(JSON.stringify(requestData));
	}
	onUploadPictureButtonPress (event) {
		this.uploadModal.style.display = "";

	}

	onTextLoaded(event) {
		if (this.laodTextRequest.readystate < 4) {
			return;
		}

		var responseData = JSON.parse(this.laodTextRequest.responseText);
		this.textContainer.innerText = responseData.text;
	}

}
window.addEventListener("load", PostUploadController.Initialize);