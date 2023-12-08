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
            display: none; /* Hide images initially */
        }
        .image-links {
            margin-bottom: 20px;
        }
        .image-container {
            display: flex;
            flex-wrap: wrap;
        }
        .thumbnail {
            width: 150px;
            height: 150px;
            margin: 10px;
            overflow: hidden;
            border: 2px solid #ccc;
            border-radius: 5px;
        }
        .thumbnail img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }
        .thumbnail:hover img {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <p>Nhấn vào số để xem ảnh:</p>
    <div class="image-links">
        <a href="#image1">1</a>
        <a href="#image2">2</a>
        <a href="#image3">3</a>
    </div>

    <div class="image-container">
        <?php
        $images = ['1.jpg', '2.jpg', '3.jpg'];

        foreach ($images as $index => $imageName) {
            $imagePath = 'imgs/' . $imageName;
            echo '<div class="thumbnail">';
            echo '<a href="#image' . ($index + 1) . '">';
            echo '<img src="' . $imagePath . '" alt="Thumbnail ' . ($index + 1) . '">';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>

    <?php
    foreach ($images as $index => $imageName) {
        $imagePath = 'imgs/' . $imageName;
        echo '<img id="image' . ($index + 1) . '" src="' . $imagePath . '" alt="Full Image ' . ($index + 1) . '">';
    }
    ?>

    <script>
        const thumbnails = document.querySelectorAll('.thumbnail');
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function () {
                const imageId = this.querySelector('a').getAttribute('href');
                const image = document.querySelector(imageId);
                const allImages = document.querySelectorAll('img');
                allImages.forEach(img => (img.style.display = 'none'));
                image.style.display = 'block';
            });
        });
    </script>
</body>
</html>
