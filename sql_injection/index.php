<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
    <style>
        /* CSS cho bảng sản phẩm */
        .table-row:nth-child(odd) {
            background-color: #f2f2f2; /* Màu sắc cho các dòng lẻ */
        }

        .table-row:nth-child(even) {
            background-color: #ffffff; /* Màu sắc cho các dòng chẵn */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <h1>Danh sách sản phẩm</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Code</th>
                        <th>Xoá</th>
                        <th>Xem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../database.php";
                    $sql = "SELECT * FROM products";
                    $result = mysqli_query($conn, $sql);

                    $count = 0; // Biến đếm dùng để xác định dòng lẻ/chẵn
                    while ($row = mysqli_fetch_assoc($result)) {
                        $count++;
                        $row_class = ($count % 2 == 0) ? 'even' : 'odd'; // Xác định lớp CSS cho từng dòng

                        echo '<tr class="table-row ' . $row_class . '">';
                        echo '<td>' . $row['ID'] . '</td>';
                        echo '<td>' . $row['Name'] . '</td>';
                        echo '<td>' . $row['Price'] . '</td>';
                        echo '<td>' . $row['Description'] . '</td>';
                        echo '<td>' . $row['Code'] . '</td>';
                        echo '<td><a href="delete_product.php?ID=' . $row['ID'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xoá sản phẩm này?\')">Xóa</a></td>';
                        echo '<td><a href="detail_product.php?ID=' . $row['ID'] . '">Xem</a></td>';
                        echo '</tr>';
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>

        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>

</html>
