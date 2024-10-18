<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Xử lý thông tin</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e90ff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
            color: #f8f8f8;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #1e90ff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }

        a:hover {
            background-color: #ffffff;
            color: #1e90ff;
        }

        .info-label {
            font-weight: bold;
            color: #00bfff;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
        }

        .info-value {
            color: #f0f0f0;
            font-weight: 500;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Bạn đã đăng nhập thành công</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hoten = $_POST['hoten'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $gioitinh = $_POST['gioitinh'];
            $quoctich = $_POST['quoctich'];
            $monhoc = isset($_POST['monhoc']) ? implode(", ", $_POST['monhoc']) : "Không có môn học nào";
            $ghichu = $_POST['ghichu'];
        ?>

            <p><span class="info-label">Họ tên:</span> <span class="info-value"><?php echo $hoten; ?></span></p>
            <p><span class="info-label">Giới tính:</span> <span class="info-value"><?php echo $gioitinh; ?></span></p>
            <p><span class="info-label">Địa chỉ:</span> <span class="info-value"><?php echo $diachi; ?></span></p>
            <p><span class="info-label">Điện thoại:</span> <span class="info-value"><?php echo $dienthoai; ?></span></p>
            <p><span class="info-label">Quốc tịch:</span> <span class="info-value"><?php echo $quoctich; ?></span></p>
            <p><span class="info-label">Môn học:</span> <span class="info-value"><?php echo $monhoc; ?></span></p>
            <p><span class="info-label">Ghi chú:</span> <span class="info-value"><?php echo $ghichu; ?></span></p>

        <?php } else { ?>
            <p>Không có thông tin để hiển thị.</p>
        <?php } ?>

        <a href="nhapThongtin.htm">Trở về trang trước</a>
    </div>
</body>

</html>