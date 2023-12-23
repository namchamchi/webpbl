<!DOCTYPE html>
<html>
<head>
  <title>Image Upload</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form">
  <h2>Select image to upload:</h2>
  <input type="file" name="fileToUpload" id="fileToUpload" class="file-input">
  <input type="submit" value="Upload Image" name="submit" class="submit-btn">
</form>

</body>
</html>
