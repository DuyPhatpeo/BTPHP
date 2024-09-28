<?php
function calculate($num1, $num2, $operation) {
    switch ($operation) {
        case 'add':
            return $num1 + $num2;
        case 'subtract':
            return $num1 - $num2;
        case 'multiply':
            return $num1 * $num2;
        case 'divide':
            return $num2 != 0 ? $num1 / $num2 : 'Không thể chia cho 0';
        default:
            return 'Phép tính không hợp lệ';
    }
}

$operationText = '';
$num1 = '';
$num2 = '';
$result = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['num1']) || empty($_POST['num2'])) {
        $error = 'Vui lòng nhập đầy đủ hai số và chọn phép tính!';
    } elseif (!is_numeric($_POST['num1']) || !is_numeric($_POST['num2'])) {
        $error = 'Vui lòng nhập số hợp lệ!';
    } else {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = calculate($num1, $num2, $operation);

        switch ($operation) {
            case 'add':
                $operationText = 'Cộng';
                break;
            case 'subtract':
                $operationText = 'Trừ';
                break;
            case 'multiply':
                $operationText = 'Nhân';
                break;
            case 'divide':
                $operationText = 'Chia';
                break;
        }
    }
} else {
    $error = 'Chưa có dữ liệu để tính toán. Vui lòng nhập số và chọn phép tính ở trang trước!';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 350px;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        h2 {
            color: #e0e0e0;
            font-size: 24px;
            margin-bottom: 20px;
        }
        label {
            font-size: 16px;
            color: #b3b3b3;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            margin: 10px 0;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #2c2c2c;
            color: #ffffff;
            text-align: center;
        }
        input[type="text"].result {
            color: #4CAF50;
            font-weight: bold;
        }
        .error {
            color: #ff6666;
            font-size: 14px;
            margin-top: 10px;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #2196F3;
            font-size: 16px;
            padding: 5px 10px;
            border: 1px solid #2196F3;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #2196F3;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php else: ?>
            <label>Chọn phép tính: <b><?= $operationText ?></b></label><br>
            <label>Số 1: </label><input type="text" value="<?= $num1 ?>" disabled><br>
            <label>Số 2: </label><input type="text" value="<?= $num2 ?>" disabled><br>
            <label>Kết quả: </label><input type="text" class="result" value="<?= $result ?>" disabled><br>
        <?php endif; ?>
        <a href="javascript:window.history.back();">Quay lại trang trước</a>
    </div>
</body>
</html>
