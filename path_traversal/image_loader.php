<?php
$file_name = $_GET['file_name']; // Lấy tên file từ tham số truyền vào

$file_path = 'imgs/' . $file_name; // Tạo đường dẫn đầy đủ đến file ảnh

if (file_exists($file_path)) { // Kiểm tra xem file có tồn tại không
    header('Content-Type: image/jpg'); // Đặt kiểu nội dung là ảnh JPEG (hoặc thay đổi tùy vào loại file ảnh)
    readfile($file_path); // Đọc và hiển thị nội dung file
} else {
    header("HTTP/1.0 404 Not Found"); // Trả về mã lỗi 404 nếu không tìm thấy file
    echo '404 Not Found'; // Xuất thông báo lỗi
    // echo $file_name;
    echo $file_path;
}
?>
