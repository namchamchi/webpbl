<!DOCTYPE html>
<html>
<head>
    <title>Thông tin sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .product-info {
            margin-top: 20px;
        }
        .product-info p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php
require_once "database.php";

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = $_GET['id'];
    
    $sql = "SELECT * FROM products WHERE ID = $product_id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        // Hiển thị thông tin sản phẩm
?>
    <div class="container">
        <h1>Thông tin sản phẩm</h1>
        <div class="product-info">
            <p><strong>ID:</strong> <?php echo $product['ID']; ?></p>
            <p><strong>Tên sản phẩm:</strong> <?php echo $product['Name']; ?></p>
            <p><strong>Giá:</strong> <?php echo number_format($product['Price'], 0, ",", ".") . " VNĐ"; ?></p>
            <p><strong>Mô tả:</strong> <?php echo $product['Description']; ?></p>
            <p><strong>Code:</strong> <?php echo $product['Code']; ?></p>
            <!-- ... Hiển thị các thông tin khác của sản phẩm -->
        </div>
    </div>
<?php
    } else {
        echo "<p>Không tìm thấy sản phẩm.</p>";
    }
} else {
    echo "<p>ID sản phẩm không hợp lệ.</p>";
}

mysqli_close($conn);
?>
</body>
</html>
