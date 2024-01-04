<!DOCTYPE html>
<html>

<head>
  <title>Image Upload</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>

  <div class="container">
    <h1>Image Upload</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form">
      <h2>Select image to upload:</h2>
      <input type="file" name="fileToUpload" id="fileToUpload" class="file-input">
      <input type="submit" value="Upload Image" name="submit" class="submit-btn">
    </form>

    <?php
    // //code lỗi
    // $target_dir = "uploads/";
    // if(isset($_FILES["fileToUpload"])) {
    //   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //   $uploadOk = 1;
    //   $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //   // Check if file already exists
    //   if (file_exists($target_file)) {
    //     echo "<p class='error'>Sorry, file already exists.</p>";
    //     $uploadOk = 0;
    //   }

    //   // Check if $uploadOk is set to 0 by an error
    //   if ($uploadOk == 0) {
    //     echo "<p class='error'>Sorry, your file was not uploaded.</p>";
    //   } else {
    //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //       echo "<p class='success'>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.</p>";
    //     } else {
    //       echo "<p class='error'>Sorry, there was an error uploading your file.</p>";
    //     }
    //   }
    // }


    $target_dir = "uploads/";
    $allowed_extensions = array("jpg", "png");
    $max_file_size = 5242880; // 5MB

    if (isset($_FILES["fileToUpload"])) {
      $target_file = $target_dir . uniqid() . "_" . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $file_size = $_FILES["fileToUpload"]["size"];

      // Check file extension
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      if (!in_array($imageFileType, $allowed_extensions)) {
        echo "<p class='error'>Sorry, only JPG and PNG files are allowed.</p>";
        $uploadOk = 0;
      }

      // Check file size
      if ($file_size > $max_file_size) {
        echo "<p class='error'>Sorry, your file is too large. Maximum file size allowed is 5MB.</p>";
        $uploadOk = 0;
      }

      // Check if it's an image using GD Library
      if (function_exists('exif_imagetype')) {
        $mime = exif_imagetype($_FILES["fileToUpload"]["tmp_name"]);
        if (!$mime || ($mime != IMAGETYPE_JPEG && $mime != IMAGETYPE_PNG)) {
          echo "<p class='error'>Sorry, the file is not a valid image.</p>";
          $uploadOk = 0;
        }
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "<p class='error'>Sorry, your file was not uploaded.</p>";
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "<p class='success'>The file " . htmlspecialchars(basename($target_file)) . " has been uploaded.</p>";
        } else {
          echo "<p class='error'>Sorry, there was an error uploading your file.</p>";
        }
      }
    }
    ?>

  </div>

</body>

</html>