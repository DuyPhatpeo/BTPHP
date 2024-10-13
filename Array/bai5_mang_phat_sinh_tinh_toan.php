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
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            padding: 20px;
            color: #333;
        }

        .form-container {
            background-color: #fff;
            max-width: 450px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: slide-down 0.5s ease-out;
        }

        @keyframes slide-down {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        h2 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 25px;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 16px;
            transition: border-color 0.3s ease;
            background-color: #f9f9f9;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        textarea[readonly] {
            background-color: #e9ecef;
            resize: none;
            height: 60px;
            white-space: nowrap;
            overflow-x: auto;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        button:active {
            background-color: #003d80;
        }

        .error {
            color: #ff4d4d;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }

        .success {
            text-align: center;
            margin-top: 20px;
        }

        /* Responsive cho thiết bị di động */
        @media (max-width: 600px) {
            .form-container {
                width: 100%;
                padding: 20px;
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
            function phat_sinh_mang($so_phan_tu) {
                $mang = array();
                for ($i = 0; $i < $so_phan_tu; $i++) {
                    $mang[] = rand(0, 100);
                }
                return $mang;
            }

            function tinh_gtln($mang) {
                return max($mang);
            }

            function tinh_gtnn($mang) {
                return min($mang);
            }

            function tinh_tong($mang) {
                return array_sum($mang);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mang'])) {
                $so_phan_tu = intval($_POST['mang']);
                
                if ($so_phan_tu > 0 && $so_phan_tu <= 20) {
                    $mang = phat_sinh_mang($so_phan_tu);
                    $gtln = tinh_gtln($mang);
                    $gtnn = tinh_gtnn($mang);
                    $tong = tinh_tong($mang);

                    echo "<div class='form-group'>
                            <label for='mang_phat_sinh'>Mảng phát sinh:</label>
                            <textarea id='mang_phat_sinh' readonly>" . implode(", ", $mang) . "</textarea>
                        </div>";
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
                    echo "<p class='error'>Vui lòng nhập số phần tử hợp lệ (1 - 20).</p>";
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
