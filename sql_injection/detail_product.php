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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
require_once "../database.php";

if(isset($_GET['ID'])) {
    $product_id = $_GET['ID'];
    
    $sql = "SELECT * FROM products WHERE ID = '$product_id'";
    $result = mysqli_query($conn, $sql); 

    if(mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        // Hiển thị thông tin sản phẩm trong bảng
?>
    <div class="container">
        <h1>Thông tin sản phẩm</h1>
        <table class="product-info">
            <tr>
                <th>ID</th>
                <td><?php echo $product['ID']; ?></td>
            </tr>
            <tr>
                <th>Tên sản phẩm</th>
                <td><?php echo $product['Name']; ?></td>
            </tr>
            <tr>
                <th>Giá</th>
                <td><?php echo $product['Price']; ?></td>
            </tr>
            <tr>
                <th>Mô tả</th>
                <td><?php echo $product['Description']; ?></td>
            </tr>
            <tr>
                <th>Code</th>
                <td><?php echo $product['Code']; ?></td>
            </tr>

            <!-- ... Thêm các dòng khác nếu cần -->
        </table>
    </div>
<?php
    } else {
        echo "<p>Không tìm thấy sản phẩm.</p>";
    }
} else {
    echo "<p>ID sản phẩm không hợp lệ.</p>";
  //  echo $result;
}

mysqli_close($conn);
?>
</body>
</html>
