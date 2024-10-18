<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính trên hai số</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #ffffff;
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

        .radio-group {
            margin: 15px 0;
        }

        input[type="radio"] {
            margin-right: 8px;
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
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #1976D2;
        }

        .error {
            color: #ff6666;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        <?php
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];

            if (empty($num1) || empty($num2)) {
                $error = 'Vui lòng nhập đầy đủ hai số!';
            } elseif (!is_numeric($num1) || !is_numeric($num2)) {
                $error = 'Vui lòng nhập số hợp lệ!';
            }
        }
        ?>

        <form method="POST" action="ketquapheptinh.php">
            <div class="radio-group">
                <label>Chọn phép tính:</label><br>
                <input type="radio" id="add" name="operation" value="add" checked>
                <label for="add">Cộng</label>
                <input type="radio" id="subtract" name="operation" value="subtract">
                <label for="subtract">Trừ</label>
                <input type="radio" id="multiply" name="operation" value="multiply">
                <label for="multiply">Nhân</label>
                <input type="radio" id="divide" name="operation" value="divide">
                <label for="divide">Chia</label>
            </div>

            <label for="num1">Số thứ nhất:</label>
            <input type="text" id="num1" name="num1" value="<?= isset($_POST['num1']) ? $_POST['num1'] : '' ?>">

            <label for="num2">Số thứ hai:</label>
            <input type="text" id="num2" name="num2" value="<?= isset($_POST['num2']) ? $_POST['num2'] : '' ?>">

            <input type="submit" value="Tính">
        </form>

        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>
</body>

</html>