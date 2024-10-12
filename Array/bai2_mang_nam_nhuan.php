<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm năm nhuận</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }
        h3 {
            color: #333;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        label {
            font-size: 18px;
            margin-bottom: 10px;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #007bff;
            border-radius: 4px;
            background-color: #e7f3ff;
        }
    </style>
</head>
<body>
    <h3>Tìm năm nhuận</h3>
    <form method="POST" action="">
        <label for="nam">Nhập năm: </label>
        <input type="text" name="nam" id="nam" required>
        <button type="submit">Tìm năm nhuận</button>
    </form>
    
    <?php
    // Kiểm tra nếu form được gửi bằng phương thức POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $nam = $_POST['nam'];
        
        // Kiểm tra xem năm có phải là số nguyên và lớn hơn 0 không
        if (is_numeric($nam) && (int)$nam > 0) {
            $nam = (int)$nam; // Ép kiểu về số nguyên để tránh lỗi

            // Hàm kiểm tra năm nhuận
            function nam_nhuan($nam) {
                // Năm nhuận chia hết cho 400 hoặc chia hết cho 4 nhưng không chia hết cho 100
                return ($nam % 400 == 0) || ($nam % 4 == 0 && $nam % 100 != 0);
            }

            // Biến chứa kết quả các năm nhuận
            $ketqua_truoc_2000 = [];
            $ketqua_sau_2000 = [];

            // Xác định dải năm để duyệt
            if ($nam < 2000) {
                // Duyệt từ năm nhập vào đến 2000
                for ($i = $nam; $i <= 2000; $i++) {
                    if (nam_nhuan($i)) {
                        $ketqua_truoc_2000[] = $i; // Thêm năm nhuận vào mảng
                    }
                }
            } else {
                // Duyệt từ 2000 đến năm nhập vào
                for ($i = 2000; $i <= $nam; $i++) {
                    if (nam_nhuan($i)) {
                        $ketqua_sau_2000[] = $i; // Thêm năm nhuận vào mảng
                    }
                }
            }

            $hasResult = false; // Biến kiểm tra xem có kết quả hay không

            // Hiển thị kết quả trước 2000
            if (count($ketqua_truoc_2000) > 0) {
                $hasResult = true;
                echo "<div class='result'>";
                echo "<h4>Các năm nhuận từ $nam đến 2000:</h4>";
                echo implode(", ", $ketqua_truoc_2000); // Hiển thị như chuỗi cách nhau bằng dấu phẩy
                echo "</div>";
            }

            // Hiển thị kết quả sau 2000
            if (count($ketqua_sau_2000) > 0) {
                $hasResult = true;
                echo "<div class='result'>";
                echo "<h4>Các năm nhuận từ 2000 đến $nam:</h4>";
                echo implode(", ", $ketqua_sau_2000); // Hiển thị như chuỗi cách nhau bằng dấu phẩy
                echo "</div>";
            }

            // Nếu không có năm nhuận nào trong cả hai dải năm đã chọn
            if (!$hasResult) {
                echo "<div class='result'><p>Không có năm nhuận nào trong khoảng đã chọn.</p></div>";
            }

        } else {
            // Nếu dữ liệu nhập vào không hợp lệ
            echo "<div class='result'><p>Vui lòng nhập một năm hợp lệ (là số và lớn hơn 0).</p></div>";
        }
    }
    ?>
</body>
</html>
