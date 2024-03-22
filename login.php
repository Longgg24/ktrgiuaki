<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Thay đổi tùy theo máy chủ của bạn
$username = "root"; // Thay đổi tùy theo tên người dùng cơ sở dữ liệu của bạn
$password = ""; // Thay đổi tùy theo mật khẩu cơ sở dữ liệu của bạn
$database = "ql_nhansu"; // Thay đổi tùy theo tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn kiểm tra thông tin đăng nhập và vai trò
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy thông tin người dùng và vai trò
        $user = $result->fetch_assoc();
        $role = $user['role'];

        // Đăng nhập thành công
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Chuyển hướng tùy theo vai trò
        if ($role == "admin") {
            header("location: list_productadmin.php"); // Trang dashboard của admin
        } else {
            header("location: list_productuser.php"); // Trang dashboard của user
        }
    } else {
        // Đăng nhập không thành công
        echo "Thông tin đăng nhập không chính xác.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>

<h2>Đăng nhập</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Tên đăng nhập:</label><br>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Mật khẩu:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Đăng nhập">
</form>

</body>
</html>

<?php
// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
