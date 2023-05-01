
function updateImageURL() {

  alert('passage fonction');  
    const fileInput = document.getElementById('image_file');
    const imageUrlInput = document.getElementById('image_url');

    if (fileInput.files && fileInput.files[0]) {
      alert('passage boucle');
      const fileName = fileInput.files[0].name;
      imageUrlInput.value = `../img/${fileName}`;
    }
  }