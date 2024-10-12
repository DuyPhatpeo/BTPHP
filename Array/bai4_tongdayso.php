<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tổng dãy số</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c2c2c; 
            color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #ffffff;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #444444;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        input[type="text"] {
            width: 95%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #555555; 
            color: #ffffff; 
        }
        input[type="text"]::placeholder {
            color: #bbbbbb;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #e7f3fe;
            color: #31708f;
            text-align: center;
        }
        .error {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #e74c3c;
            border-radius: 5px;
            background-color: #f2dede;
            color: #a94442;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Nhập và tính trên dãy số</h1>
    <div class="container">
        <form method="POST" action="">
            Nhập dãy số: <input type="text" name="dayso" placeholder="1,2,3,4,5" value="<?php if(isset($_POST['dayso'])) echo $_POST['dayso']; ?>" required>
            <input type="submit" name="tinh_tong" value="Tổng dãy số">
        </form>

        <?php
        if (isset($_POST['tinh_tong'])) {
            // Lấy giá trị dãy số từ form
            $dayso = $_POST['dayso'];

            // Kiểm tra nếu dãy số không chứa dấu phẩy
            if (strpos($dayso, ',') === false) {
                echo "<div class='error'>Vui lòng sử dụng dấu phẩy (,) để ngăn cách các số.</div>";
            } else {
                // Tách chuỗi thành mảng dựa trên dấu phẩy
                $mang_so = explode(',', $dayso);
                $tong = 0;
                $allNumeric = true; // Biến kiểm tra tất cả các phần tử có phải số hay không

                foreach ($mang_so as $so) {
                    if (!is_numeric(trim($so))) { // Kiểm tra xem số có phải là số hay không
                        $allNumeric = false;
                        break; // Dừng kiểm tra nếu tìm thấy phần tử không phải số
                    }
                    $tong += (int)trim($so); // Cộng dồn tổng
                }

                // Hiển thị thông báo nếu không phải số
                if (!$allNumeric) {
                    echo "<div class='error'>Vui lòng đảm bảo tất cả các phần tử là số.</div>";
                } else {
                    // Hiển thị tổng
                    echo "<div class='result'><h2>Tổng dãy số: $tong</h2></div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
