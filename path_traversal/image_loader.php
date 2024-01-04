<?php
// $file_name = $_GET['file_name']; // Lấy tên file từ tham số truyền vào

// $file_path = 'imgs/' . $file_name; // Tạo đường dẫn đầy đủ đến file ảnh

// if (file_exists($file_path)) { // Kiểm tra xem file có tồn tại không
//     header('Content-Type: image/jpg'); // Đặt kiểu nội dung là ảnh JPEG (hoặc thay đổi tùy vào loại file ảnh)
//     readfile($file_path); // Đọc và hiển thị nội dung file
// } else {
//     header("HTTP/1.0 404 Not Found"); // Trả về mã lỗi 404 nếu không tìm thấy file
//     echo '404 Not Found'; // Xuất thông báo lỗi
//     // echo $file_name;
//     echo $file_path;
// }

$file_name = $_GET['file_name'];

// Xác thực tên file để đảm bảo chỉ chứa các ký tự hợp lệ (ví dụ: chỉ là các chữ cái, số, dấu chấm, gạch dưới...)
if (preg_match('/^[a-zA-Z0-9_.-]+$/', $file_name)) {
    $file_path = 'imgs/' . $file_name; // Tạo đường dẫn đầy đủ đến file ảnh

    if (file_exists($file_path) && strpos(realpath($file_path), realpath('imgs')) === 0) {
        // Kiểm tra xem file có tồn tại không và xem đường dẫn tuyệt đối của file có bắt đầu bằng đường dẫn tuyệt đối của thư mục imgs hay không
        header('Content-Type: image/jpeg');
        readfile($file_path);
        exit;
    }
}

header("HTTP/1.0 404 Not Found");
echo '404 Not Found';

?>
