<!DOCTYPE html>
<html>
<head>
  <title>Image Upload</title>
  <link rel="stylesheet" href="styles.css">
  <script>
    function validateFile() {
      var fileInput = document.getElementById('fileToUpload');
      var fileName = fileInput.value;
      if (!fileName.endsWith('.jpg') && !fileName.endsWith('.png')) {
        alert('Error: You can only upload files with .jpg or .png extension.');
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
<a href="logout.php">Logout</a>
  <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form" onsubmit="return validateFile()">
    <h2>Select image to upload:</h2>
    <input type="file" name="fileToUpload" id="fileToUpload" class="file-input">
    <input type="submit" value="Upload Image" name="submit" class="submit-btn">
  </form>
</body>
</html>