// Function to handle the form submission
document.getElementById('upload-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission
  
    // Get the file input element
    var fileInput = document.getElementById('image-upload');
  
    // Check if a file is selected
    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];
      var reader = new FileReader();
  
      // Read the file as a data URL
      reader.readAsDataURL(file);
  
      // Handle the file load event
      reader.onload = function () {
        var imageUrl = reader.result;
  
        // Call a function to save the image URL
        saveImage(imageUrl);
      };
    }
  });
  
  // Function to save the image URL
  function saveImage(imageUrl) {
    // Create a new image element
    var image = document.createElement('img');
    image.src = imageUrl;
  
    // Create a new image card
    var imageCard = document.createElement('div');
    imageCard.className = 'image-card';
    imageCard.appendChild(image);
  
    // Create a delete button
    var deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.addEventListener('click', function () {
      deleteImage(imageCard);
    });
  
    // Append the delete button to the image card
    imageCard.appendChild(deleteButton);
  
    // Create an update button
    var updateButton = document.createElement('button');
    updateButton.textContent = 'Update';
    updateButton.addEventListener('click', function () {
      updateImage(imageCard);
    });
  
    // Append the update button to the image card
    imageCard.appendChild(updateButton);
  
    // Append the image card to the gallery
    var gallery = document.getElementById('image-gallery');
    gallery.appendChild(imageCard);
  }
  
  // Function to delete the image
  function deleteImage(imageCard) {
    // Remove the image card from the gallery
    var gallery = document.getElementById('image-gallery');
    gallery.removeChild(imageCard);
  }
  
  // Function to handle image update
  function updateImage(imageCard) {
    var fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.addEventListener('change', function () {
      if (fileInput.files.length > 0) {
        var file = fileInput.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
          var imageUrl = reader.result;
          var image = imageCard.querySelector('img');
          image.src = imageUrl;
        };
      }
    });
    fileInput.click();
  }
  