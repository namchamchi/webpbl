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

        th,
        td {
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
//code lỗi
require_once "../database.php";

if (isset($_GET['ID'])) {
    $product_id = $_GET['ID'];

    $sql = "SELECT * FROM products WHERE ID = '$product_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        include 'product_info_template.php'; // Including the HTML template
    } else {
        echo "<p>Không tìm thấy sản phẩm.</p>";
    }
} else {
    echo "<p>ID sản phẩm không hợp lệ.</p>";
    // echo $result;
}

mysqli_close($conn);

// require_once "../database.php";

// if (isset($_GET['ID']) && is_numeric($_GET['ID'])) {
//     $product_id = $_GET['ID'];

//     $sql = "SELECT * FROM products WHERE ID = ?";
    
//     // Sử dụng prepared statement
//     $stmt = mysqli_prepare($conn, $sql);
    
//     // Kiểm tra nếu prepared statement chuẩn bị thành công
//     if ($stmt) {
//         // Gắn giá trị vào statement và thực thi
//         mysqli_stmt_bind_param($stmt, "i", $product_id);
//         mysqli_stmt_execute($stmt);

//         $result = mysqli_stmt_get_result($stmt);

//         if (mysqli_num_rows($result) > 0) {
//             $product = mysqli_fetch_assoc($result);
//         } else {
//             echo "<p>Không tìm thấy sản phẩm.</p>";
//         }

//         mysqli_stmt_close($stmt);
//     } else {
//         echo "<p>Có lỗi xảy ra khi thực hiện truy vấn.</p>";
//     }
// } else {
//     echo "<p>ID sản phẩm không hợp lệ.</p>";
// }

// mysqli_close($conn);

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
        <!-- ... Add more rows if needed -->
    </table>
</div>  
</body>

</html>