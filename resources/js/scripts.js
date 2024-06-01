
// Working with form
let imagesForm = document.querySelector('#upload-form');
let filesInput = document.querySelector('#files');

// when user selected images
filesInput.addEventListener('change', renderPreviewImages)

// render preview for images
function renderPreviewImages(e) {
    let files = e.target.files;
    let previews = document.querySelector('#previews');
    previews.innerHTML = '';

    if (files.length > 5) {
        alert('Вы можете загрузить до 5 файлов!');
        return;
    }

    Array.from(files).forEach(file => {
        let fileReader = new FileReader();
        fileReader.readAsDataURL(file);
        fileReader.onload = () => {
            previews.innerHTML += makeHtmlForImage(fileReader.result, file.name)
        };
    })
}

const makeHtmlForImage = (src, alt) => {
    return `<div class="img-prev"><img src="${src}" alt="${alt}"></div>`
}
