<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbansua";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$message = "";

function isValidUsername($username)
{
    return preg_match('/^[a-zA-Z0-9_]+$/', $username);
}

if (isset($_POST['register'])) {
    $ten_user = $_POST['Ten_user'];
    $password = $_POST['Password'];

    if (!isValidUsername($ten_user)) {
        $message = "Tên người dùng chỉ được chứa chữ cái, số và dấu gạch dưới (_).";
    } else {
        $sql = "INSERT INTO user (Ten_user, Password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $ten_user, $password);

        if ($stmt->execute()) {
            $message = "Đăng ký thành công!";
        } else {
            $message = "Lỗi: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f7f7f7;
        }

        .container {
            width: 280px;
            padding: 20px;
            background: white;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .message {
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php if ($message) echo "<p class='message'>$message</p>"; ?>

        <h2>Đăng ký</h2>
        <form method="POST" action="">
            <a>Trần Duy Phát</table></a>
            <div class="form-group">
                <input type="text" name="Ten_user" placeholder="Tên người dùng" required>
            </div>
            <div class="form-group">
                <input type="password" name="Password" placeholder="Mật khẩu" required>
            </div>
            <button type="submit" name="register">Đăng ký</button>
        </form>
    </div>

</body>

</html>