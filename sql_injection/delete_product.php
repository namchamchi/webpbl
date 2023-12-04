<?php
require_once "database.php";

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = $_GET['id'];
    
    $sql = "DELETE FROM products WHERE id = $product_id";
    if(mysqli_query($conn, $sql)) {
        echo "Sản phẩm đã được xoá thành công.";
    } else {
        echo "Xảy ra lỗi khi xoá sản phẩm: " . mysqli_error($conn);
    }
} else {
    echo "ID sản phẩm không hợp lệ.";
}

mysqli_close($conn);
header("Location: index.php");
?>
