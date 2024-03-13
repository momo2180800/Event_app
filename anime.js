const dropArea = document.getElementById("drag-area");
const inputFile = document.getElementById("image");
const imageView = document.getElementById("upload-icon");

inputFile.addEventListener("change", uploadImage);

function uploadImage() {
    let imgLink = URL.createObjectURL(inputFile.files[0]);
    imageView.style.backgroundImage = `url(${imgLink})`;
    imageView.textContent = "";
    imageView.style.border = "none";
}



