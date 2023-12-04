<!DOCTYPE html>
<html>
<head>
    <title>Hiển thị ảnh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        p {
            font-size: 18px;
        }
        a {
            text-decoration: none;
            color: #333;
            font-size: 20px;
            margin-right: 10px;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
        }
        .image-links {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
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
