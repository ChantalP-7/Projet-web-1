let mesImages = document.querySelectorAll("#grid-images img");

for (let i = 0; i < mesImages.length; i++) {
	mesImages[i].addEventListener("click", showImage, false);
	mesImages[i].addEventListener("click", ecritInfo, false);
}

function ecritInfo(e) {
	let texte = e.target;
	let mesAlt = document.querySelectorAll("#grid-images img");
	for (let monAlt of mesAlt) {
		let alt = monAlt.getAttribute("alt");
		//let caption = document.querySelector('figcaption');
		let caption = document.querySelector("figcaption");
		if (texte.getAttribute("alt") === alt) {
			caption.innerHTML = alt;
			caption.classList.add("figcaption");
		}
		let imageContainer = document.getElementById("galleryContainer");
		imageContainer.appendChild(caption);
	}
}

function showImage(e) {
	let image = e.target;
	let imageContainer = document.getElementById("galleryContainer");
	let bigImage = imageContainer.querySelector("img");
	bigImage.src = image.src;
	imageContainer.classList.toggle("visible");
	imageContainer.addEventListener("click", closeImage, false);
}

function closeImage(e) {
	let imageContainer = document.getElementById("galleryContainer");
	imageContainer.classList.toggle("visible");
}
