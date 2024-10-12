<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính năm âm lịch</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 24px;
        }
        label {
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
        }
        .result h3 {
            font-size: 20px;
            color: #333;
        }
        .result img {
            margin-top: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tính năm âm lịch</h2>
        <form method="POST" action="">
            <label for="nam">Nhập năm dương lịch:</label>
            <!-- Sử dụng value để giữ lại giá trị đã nhập sau khi submit -->
            <input type="number" id="nam" name="nam" placeholder="VD: 1995" required value="<?php echo isset($_POST['nam']) ? $_POST['nam'] : ''; ?>">
            <br>
            <button type="submit">Tính năm âm lịch</button>
        </form>

        <div class="result">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Mảng can, chi, hình ảnh
                $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
                $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
                $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.jpg", "ty2.jpg", "ngo.jpg", "mui.jpg", "than.gif", "dau.jpg", "tuat.jpg");

                // Nhận năm nhập vào và tính can, chi
                $nam = intval($_POST['nam']);
                $can = ($nam - 3) % 10;
                $chi = ($nam - 3) % 12;
                $nam_al = $mang_can[$can] . " " . $mang_chi[$chi];
                $hinh = $mang_hinh[$chi];

                // Xuất kết quả
                echo "<h3>Năm âm lịch: $nam_al</h3>";
                echo "<img src='12congiap/$hinh' alt='$nam_al'>";
            }
            ?>
        </div>
    </div>
</body>
</html>
