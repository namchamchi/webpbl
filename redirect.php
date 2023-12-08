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
                header("Location: path_traversal/index.php");
                break;
            case 'page4':
                header("Location: command_Injection/index.html");
                break;
            default:
                header("Location: index.php");
                break;
        }
    }
}
?>
