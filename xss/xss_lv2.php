<?php
$date = new DateTime('+1 day');
setcookie('password', 'ilovesecrets', $date->getTimestamp());
/**
 * Connecting to DB
 */
$con = new PDO('mysql:host=localhost;dbname=db_webpbl6', 'root', '');
$commentObject = $con->query("SELECT * FROM comments_2");
$commentObject->setFetchMode(PDO::FETCH_OBJ);
if (isset($_POST['submit'])) {
    // //code lỗi
    // $name = $_POST['name'];
    // $body =  htmlspecialchars($_POST['body'], ENT_QUOTES);
    // $body = str_replace("<script>", "",$_POST["body"]);
    // $commentQuery = $con->prepare("INSERT INTO comments_2(name, body) VALUES(:name, :body)");
    // $commentQuery->execute(['name' => $name, 'body' => $body]);

    $name = htmlspecialchars($_POST['name'], ENT_QUOTES); // Chuyển đổi ký tự đặc biệt thành HTML entities
    $body = htmlspecialchars($_POST['body'], ENT_QUOTES); // Chuyển đổi ký tự đặc biệt thành HTML entities

    // Kiểm tra và xử lý dữ liệu trước khi lưu vào cơ sở dữ liệu
    if (!empty($name) && !empty($body)) {
        // Tạo prepared statement
        $commentQuery = $con->prepare("INSERT INTO comments_2 (name, body) VALUES (:name, :body)");

        // Bind dữ liệu và thực thi truy vấn
        $commentQuery->execute(['name' => $name, 'body' => $body]);

        // Thông báo lưu thành công hoặc điều chỉnh code để xử lý khi lưu dữ liệu thành công
        echo "Lưu dữ liệu thành công!";
    } else {
        // Xử lý khi dữ liệu không hợp lệ, ví dụ: hiển thị thông báo lỗi
        echo "Vui lòng điền đầy đủ thông tin!";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <!-- Nút "Back" để quay lại trang chủ -->
    <a href="logout.php">logout</a>
</body>
</html>
<!doctype html><html lang="en"><head><meta charset="UTF-8"><title>Document</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></head><body><div class="col-sm-6 col-sm-offset-3"><h3 class="text-center">Make your comment</h3><form action="" method="post" autocomplete="off"><div class="form-group"><label for="Name">Name</label><input type="text" name="name" class="form-control"></div><div class="form-group"><label for="comment">Comment</label><textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea></div><input type="submit" name="submit"></form><table class="table"><thead><tr><th>Name</th><th>Body</th></tr></thead><tbody>
<?php
while ($comment = $commentObject->fetch()) {
    echo "<tr>";
    echo "<td>$comment->Name</td>";
    echo "<td>$comment->Body</td>";
    echo "</tr>";
}
?></tbody></table></div></body></html>
