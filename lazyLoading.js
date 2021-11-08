function loadFullImage(event) {
	var img = event.currentTarget;
	img.onload = null;
	img.src = img.src.replace("%20(Thumbnail)", "");
}