<!DOCTYPE html>
<html>
<head>
    <title>Tải lên ảnh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Tải lên tệp tin</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Tải lên" name="submit">
    </form>

    <p>Nhấn vào số để xem ảnh:</p>
    <div class="image-links">
        <a href="?image=1">1</a>
        <a href="?image=2">2</a>
        <a href="?image=3">3</a>
    </div>

    <?php
    $images = ['1.jpg', '2.jpg', '3.jpg'];

    if (isset($_GET['image']) && is_numeric($_GET['image'])) {
        $imageNumber = (int)$_GET['image'];

        if ($imageNumber >= 1 && $imageNumber <= count($images)) {
            $imageName = $images[$imageNumber - 1];
            $imagePath = 'imgs/' . $imageName;
            echo '<img src="' . $imagePath . '" alt="">';
        } else {
            echo '<p>Ảnh không tồn tại.</p>';
        }
    }
    ?>
</body>
</html>
