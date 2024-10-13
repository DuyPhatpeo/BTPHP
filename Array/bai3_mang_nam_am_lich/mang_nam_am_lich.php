<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính năm âm lịch</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            background-color: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            max-width: 420px;
            width: 100%;
            transition: transform 0.3s ease;
        }
        .container:hover {
            transform: scale(1.03);
        }
        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: 600;
        }
        label {
            font-weight: 600;
            color: #555;
            font-size: 16px;
        }
        input[type="number"] {
            width: 100%;
            padding: 14px;
            margin: 14px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input[type="number"]:focus {
            border-color: #4CAF50;
            outline: none;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 14px 22px;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 10px;
        }
        button:hover {
            background-color: #45a049;
            transform: translateY(-3px);
        }
        .result {
            margin-top: 25px;
        }
        .result h3 {
            font-size: 22px;
            color: #333;
        }
        .result img {
            margin-top: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            width: 160px;
            transition: transform 0.3s ease;
        }
        .result img:hover {
            transform: rotate(5deg) scale(1.05);
        }
        @media (max-width: 500px) {
            h2 {
                font-size: 22px;
            }
            input[type="number"], button {
                font-size: 14px;
            }
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
                $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.jpg", "ty2.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");

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
