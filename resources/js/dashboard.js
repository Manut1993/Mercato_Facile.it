// //product orm
// const dropArea = document.getElementById('drop-area');
// const imagePreview = document.getElementById('image-preview');
// const previewImage = document.getElementById('preview-image');

// const svgImage = document.querySelector('#svg-image');
// const input = document.querySelector('#file-upload')
        
// dropArea.addEventListener('dragover', (event) => {
//     event.preventDefault();
//     dropArea.classList.add('bg-gray-200');
// });
        
// dropArea.addEventListener('dragleave', () => {
//     dropArea.classList.remove('bg-gray-200');
// });
        
// dropArea.addEventListener('drop', (event) => {
//     event.preventDefault();
//     dropArea.classList.remove('bg-gray-200');
//     const files = event.dataTransfer.files;
 
//     if (files.length > 0) {
//         const reader = new FileReader();

//         reader.onload = function(e) {
//             previewImage.src = e.target.result;
//             imagePreview.classList.remove('hidden');
//             svgImage.classList.add('hidden');
//         }

//         reader.readAsDataURL(files[0]);
//     }
// });

// input.addEventListener('input', displayImage);

// function displayImage() {
//     const reader = new FileReader();
        
//     reader.onload = function(e) {
//         previewImage.src = e.target.result;
//         imagePreview.classList.remove('hidden');
//         svgImage.classList.add('hidden');
//     }
        
//     reader.readAsDataURL(input.files[0]);
// }
// //fine product form