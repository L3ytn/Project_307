class PostUploadController {
	static initialize() {
		PostUploadController.instance = new PostUploadController();
	}

	constructor() {
		this.titleText = document.getElementById("title-text");
		this.descriptionText = document.getElementById("description-text");
		this.licenseSelect = document.getElementById("license-select");
		this.imageUrl = document.getElementById("image-url-field");
		this.uploadModal = document.getElementById("upload-modal");
		this.cancelButton = document.getElementById("cancel-button");
		this.uploadPictureButton = document.getElementById("upload-picture-button");

		this.cancelButton.addEventListener("click", this.onCancelButtonPress.bind(this));
		this.uploadPictureButton.addEventListener("click", this.onUploadPictureButtonPress.bind(this));
		//this.uploadButton.addEventListener("click", this.onUploadButtonPress.bind(this));
	}

	onCancelButtonPress(event) {
		window.open("index.php", "_self");
	}

	onUploadButtonPress(event) {
		event.preventDefault();
		var titleText = this.titleText.value;
		var descriptionText = this.descriptionText.value;
		var licenseSelect = this.licenseSelect.value;
		var imageUrl = this.imageUrl.value;

		var requestData = {
			title: titleText,
			description: descriptionText,
			license: licenseSelect,
			image: imageUrl
		};

		this.loadTextRequest = new XMLHttpRequest();
		this.loadTextRequest.onreadystatechanged = this.onTextLoaded.bind(this);
		this.loadTextRequest.open("POST", "App/Server/Service/post.php");
		this.loadTextRequest.send(JSON.stringify(requestData));
	}
	onUploadPictureButtonPress (event) {
		this.uploadModal.parentNode.style.display = "";

	}

	onTextLoaded(event) {
		if (this.laodTextRequest.readystate < 4) {
			return;
		}

		var responseData = JSON.parse(this.laodTextRequest.responseText);
		this.textContainer.innerText = responseData.text;
	}

}
window.addEventListener("load", PostUploadController.initialize);