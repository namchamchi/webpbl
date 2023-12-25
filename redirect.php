<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['page'])) {
        $page = $_POST['page'];
        
        // Chuyển hướng đến trang tương ứng
        switch ($page) {
            case 'page1':
                header("Location: xss/index.php");
                break;
            case 'page2':
                header("Location: sql_injection/index.php");
                break;
            case 'page3':
                header("Location: path_traversal/index.html");
                break;
            case 'page4':
                header("Location: file_upload/login.php");
                break;
            default:
                header("Location: index.php");
                break;
        }
    }
}
?>
