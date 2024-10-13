<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp Xếp Mảng</title>
    <!-- Thêm Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }
        .form-container h2 {
            text-align: center;
            font-weight: 500;
            margin-bottom: 25px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s;
        }
        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
        .radio-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .radio-group input[type="radio"] {
            margin-right: 5px;
        }
        .radio-group label {
            margin-right: 15px;
            font-weight: 500;
            color: #555;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Sắp Xếp Mảng</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="mang">Nhập mảng (các số ngăn cách nhau bởi dấu phẩy):</label>
            <input type="text" id="mang" name="mang" value="<?= isset($_POST['mang']) ? htmlspecialchars($_POST['mang']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label>Chọn kiểu sắp xếp:</label>
            <div class="radio-group">
                <label for="tang">
                    <input type="radio" id="tang" name="sapxep" value="tang" <?= isset($_POST['sapxep']) && $_POST['sapxep'] == 'tang' ? 'checked' : ''; ?>>
                    Tăng dần
                </label>
                <label for="giam">
                    <input type="radio" id="giam" name="sapxep" value="giam" <?= isset($_POST['sapxep']) && $_POST['sapxep'] == 'giam' ? 'checked' : ''; ?>>
                    Giảm dần
                </label>
            </div>
        </div>
        <button type="submit">Sắp Xếp</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mang = isset($_POST['mang']) ? explode(',', $_POST['mang']) : [];
        $mang = array_map('trim', $mang); // Xóa khoảng trắng
        $mang = array_map('floatval', $mang); // Đảm bảo các giá trị là số
        
        if ($_POST['sapxep'] == 'tang') {
            sort($mang);
        } elseif ($_POST['sapxep'] == 'giam') {
            rsort($mang);
        }
        
        echo '<div class="result">';
        echo '<h3>Mảng sau khi sắp xếp:</h3>';
        echo '<p>' . implode(', ', $mang) . '</p>';
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
