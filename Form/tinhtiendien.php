<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền điện</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #f0f0f0;
        }

        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
        }

        .container h2 {
            text-align: center;
            color: #f0f0f0;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 5px;
            color: #f0f0f0;
            height: 40px;
            line-height: 40px;
        }

        .form-group input[type="number"],
        .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #444;
            border-radius: 4px;
            background-color: #333;
            color: #f0f0f0;
        }

        .form-group input[readonly] {
            background-color: #555;
        }

        .input-group {
            display: flex;
        }

        .input-group input {
            flex: 1;
        }

        .input-group span {
            padding: 8px;
            background-color: #444;
            border: 1px solid #444;
            border-left: none;
            border-radius: 0 4px 4px 0;
            color: #f0f0f0;
            display: inline-block;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        .error {
            color: #ff6666;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Tính tiền điện</h2>
        <?php
        $error = '';
        $soTien = '';

        function formatCurrency($number)
        {
            return number_format($number, 0, ',', '.');
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenChuHo = $_POST['tenChuHo'];
            $chiSoCu = $_POST['chiSoCu'];
            $chiSoMoi = $_POST['chiSoMoi'];
            $donGia = $_POST['donGia'];

            // Kiểm tra tính hợp lệ của các giá trị nhập vào
            if (empty($tenChuHo)) {
                $error = "Vui lòng nhập tên chủ hộ.";
            } elseif ($chiSoCu < 0 || $chiSoMoi < 0) {
                $error = "Chỉ số không được là số âm.";
            } elseif ($chiSoMoi <= $chiSoCu) {
                $error = "Chỉ số mới phải lớn hơn chỉ số cũ.";
            } elseif ($donGia <= 0) {
                $error = "Đơn giá phải lớn hơn 0.";
            } else {
                // Tính số tiền thanh toán
                $soTien = ($chiSoMoi - $chiSoCu) * $donGia;
                $soTien = formatCurrency($soTien); // Định dạng kiểu tiền tệ
            }
        }
        ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="tenChuHo">Tên chủ hộ:</label>
                <input type="text" name="tenChuHo" id="tenChuHo" value="<?php echo isset($tenChuHo) ? $tenChuHo : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="chiSoCu">Chỉ số cũ:</label>
                <div class="input-group">
                    <input type="number" name="chiSoCu" id="chiSoCu" value="<?php echo isset($chiSoCu) ? $chiSoCu : ''; ?>" required>
                    <span>kWh</span>
                </div>
            </div>
            <div class="form-group">
                <label for="chiSoMoi">Chỉ số mới:</label>
                <div class="input-group">
                    <input type="number" name="chiSoMoi" id="chiSoMoi" value="<?php echo isset($chiSoMoi) ? $chiSoMoi : ''; ?>" required>
                    <span>kWh</span>
                </div>
            </div>
            <div class="form-group">
                <label for="donGia">Đơn giá:</label>
                <div class="input-group">
                    <input type="number" name="donGia" id="donGia" value="<?php echo isset($donGia) ? $donGia : '20000'; ?>" required>
                    <span>VNĐ</span>
                </div>
            </div>
            <div class="form-group">
                <label for="soTien">Số tiền thanh toán:</label>
                <div class="input-group">
                    <input type="text" name="soTien" id="soTien" value="<?php echo $soTien ? $soTien . ' VNĐ' : ''; ?>" readonly>
                </div>
            </div>
            <button type="submit" name="tinh">Tính</button>
            <?php if (!empty($error)) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>