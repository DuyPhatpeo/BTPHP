<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đếm phần tử, ghép mảng và sắp xếp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Đếm phần tử, ghép mảng và sắp xếp</h1>
    <form method="POST">
        <label for="mangA">Mảng A:</label>
        <input type="text" id="mangA" name="mangA" value="<?php echo isset($_POST['mangA']) ? htmlspecialchars($_POST['mangA']) : ''; ?>" placeholder="Nhập mảng A, ví dụ: 1,2,3">

        <label for="mangB">Mảng B:</label>
        <input type="text" id="mangB" name="mangB" value="<?php echo isset($_POST['mangB']) ? htmlspecialchars($_POST['mangB']) : ''; ?>" placeholder="Nhập mảng B, ví dụ: 4,5,6">

        <button type="submit" name="submit">Thực hiện</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Xử lý mảng
        $mangA = isset($_POST['mangA']) ? explode(',', $_POST['mangA']) : [];
        $mangB = isset($_POST['mangB']) ? explode(',', $_POST['mangB']) : [];

        // Ghép mảng A và B
        $mangC = array_merge($mangA, $mangB);

        // Đếm số phần tử trong mỗi mảng
        $soPhanTuA = count($mangA);
        $soPhanTuB = count($mangB);
        $soPhanTuC = count($mangC);

        // Sắp xếp mảng C tăng dần và giảm dần
        $mangCTangDan = $mangC;
        sort($mangCTangDan);

        $mangCGiamDan = $mangC;
        rsort($mangCGiamDan);

        // Hiển thị kết quả
        echo '<div class="result">';
        echo '<h3>Kết quả:</h3>';
        echo 'Số phần tử trong mảng A: ' . $soPhanTuA . '<br>';
        echo 'Số phần tử trong mảng B: ' . $soPhanTuB . '<br>';
        echo 'Số phần tử trong mảng C: ' . $soPhanTuC . '<br>';
        echo 'Mảng C tăng dần: ' . implode(', ', $mangCTangDan) . '<br>';
        echo 'Mảng C giảm dần: ' . implode(', ', $mangCGiamDan) . '<br>';
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
