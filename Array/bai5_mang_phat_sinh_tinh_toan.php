<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát sinh mảng và tính toán</title>
    <style>
        /* Reset mặc định */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[readonly] {
            background-color: #e9ecef;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Responsive cho thiết bị di động */
        @media (max-width: 600px) {
            .form-container {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Phát sinh mảng và tính toán</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="mang">Nhập số phần tử:</label>
                <input type="text" id="mang" name="mang" placeholder="Tối đa 20 số" value="<?= isset($_POST['mang']) ? $_POST['mang'] : '' ?>" required>
            </div>

            <div class="form-group">
                <button type="submit">Phát sinh và tính toán</button>
            </div>

            <?php
            // Hàm phát sinh mảng ngẫu nhiên
            function phat_sinh_mang($so_phan_tu) {
                $mang = array();
                for ($i = 0; $i < $so_phan_tu; $i++) {
                    $mang[] = rand(0, 100); // Phát sinh số ngẫu nhiên từ 0 đến 100
                }
                return $mang;
            }

            // Hàm tính GTLN (Giá trị lớn nhất)
            function tinh_gtln($mang) {
                return max($mang);
            }

            // Hàm tính GTNN (Giá trị nhỏ nhất)
            function tinh_gtnn($mang) {
                return min($mang);
            }

            // Hàm tính tổng các phần tử trong mảng
            function tinh_tong($mang) {
                return array_sum($mang);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mang'])) {
                $so_phan_tu = intval($_POST['mang']);
                
                if ($so_phan_tu > 0 && $so_phan_tu <= 20) {
                    // Phát sinh mảng
                    $mang = phat_sinh_mang($so_phan_tu);

                    // Tính GTLN, GTNN và Tổng
                    $gtln = tinh_gtln($mang);
                    $gtnn = tinh_gtnn($mang);
                    $tong = tinh_tong($mang);

                    // Hiển thị mảng đã phát sinh
                    echo "<div class='form-group'>
                            <label for='mang_phat_sinh'>Mảng phát sinh:</label>
                            <input type='text' id='mang_phat_sinh' value='" . implode(", ", $mang) . "' readonly>
                        </div>";
                    // Hiển thị kết quả
                    echo "
                    <div class='form-group'>
                        <label for='gtln'>GTLN (MAX) trong mảng:</label>
                        <input type='text' id='gtln' name='gtln' value='{$gtln}' readonly>
                    </div>
                    
                    <div class='form-group'>
                        <label for='gtnn'>GTNN (MIN) trong mảng:</label>
                        <input type='text' id='gtnn' name='gtnn' value='{$gtnn}' readonly>
                    </div>
                    
                    <div class='form-group'>
                        <label for='tong'>Tổng:</label>
                        <input type='text' id='tong' name='tong' value='{$tong}' readonly>
                    </div>";

                    
                } else {
                    echo "<p style='color: red;'>Vui lòng nhập số phần tử hợp lệ (1 - 20).</p>";
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
