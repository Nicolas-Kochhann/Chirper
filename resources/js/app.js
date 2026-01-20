import './bootstrap';

 function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    
    reader.onload = function(){
        var img = document.getElementById('picture-image');
        img.src = reader.result;
    };
    
    if(input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}

window.addEventListener('DOMContentLoaded', () => {
    const buttonChagePicture = document.getElementById('picture-button');
    const pictureInput = document.getElementById('picture-input');
    const pictureImg = document.getElementById('picture-image');

    buttonChagePicture.addEventListener('click', () => {
        if(pictureInput.classList.contains('hidden')) {
            pictureInput.classList.remove('hidden')
            buttonChagePicture.textContent = 'Close';
        } else {
            pictureInput.classList.add('hidden');
            buttonChagePicture.textContent = 'Change';
        } 
    })

    pictureInput.addEventListener('change', (event) => {
        previewImage(event);
    })

    
})
