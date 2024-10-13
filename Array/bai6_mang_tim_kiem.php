<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Số Trong Mảng</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .search-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .search-container h2 {
            text-align: center;
            font-size: 24px;
            color: #00796b;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #00796b;
            font-size: 16px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #b2dfdb;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #00796b;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #004d40;
        }

        .result {
            margin-top: 20px;
            padding: 20px;
            background-color: #e0f2f1;
            color: #004d40;
            border: 1px solid #80cbc4;
            border-radius: 8px;
            font-size: 16px;
            text-align: center;
        }

        .result strong {
            color: #00796b;
        }
    </style>
</head>
<body>

<div class="search-container">
    <h2>Tìm Kiếm Số Trong Mảng</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="mang">Nhập mảng số (các số cách nhau bằng dấu phẩy):</label>
            <input type="text" id="mang" name="mang" value="<?php echo isset($_POST['mang']) ? $_POST['mang'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="so">Nhập số cần tìm:</label>
            <input type="text" id="so" name="so" value="<?php echo isset($_POST['so']) ? $_POST['so'] : ''; ?>" required>
        </div>
        <button type="submit">Tìm kiếm</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $mang = $_POST['mang'];
        $so = $_POST['so'];

        // Chuyển chuỗi thành mảng số nguyên
        $arr = array_map('trim', explode(',', $mang));

        // Kiểm tra xem số có trong mảng không và lấy vị trí
        $vi_tri = array_search($so, $arr);

        if ($vi_tri !== false) {
            echo "<div class='result'>Đã tìm thấy số <strong>$so</strong> tại vị trí <strong>" . ($vi_tri + 1) . "</strong> trong mảng.</div>";
        } else {
            echo "<div class='result'>Không tìm thấy số <strong>$so</strong> trong mảng.</div>";
        }
    }
    ?>
</div>

</body>
</html>
