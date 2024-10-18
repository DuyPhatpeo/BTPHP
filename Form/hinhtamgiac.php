<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tính diện tích và chu vi tam giác</title>
    <style type="text/css">
        body {
            background-color: #121212;
            /* Nền tối */
            font-family: Arial, sans-serif;
            color: #f0f0f0;
            /* Màu chữ sáng */
        }

        table {
            background: #1e1e1e;
            /* Nền bảng tối */
            border: 2px solid #4CAF50;
            /* Đổi màu viền thành xanh lá */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
            /* Bóng mờ đậm hơn */
            margin: 50px auto;
        }

        thead {
            background: #4CAF50;
            /* Đổi màu nền của tiêu đề thành xanh lá */
            color: white;
            border-radius: 10px;
        }

        td {
            color: #f0f0f0;
            padding: 10px;
        }

        input[type="text"] {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #333;
            /* Nền input */
            color: #f0f0f0;
            /* Màu chữ input */
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            /* Đổi màu nút thành xanh lá */
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
            /* Màu hover cho nút */
        }

        h3 {
            font-family: Verdana, sans-serif;
            text-align: center;
            color: #f0f0f0;
            /* Màu tiêu đề */
            font-size: 18px;
        }

        .error {
            color: #ff6666;
            /* Màu đỏ sáng cho lỗi */
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php
    $a = $b = $c = $chuvi = $dientich = $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = trim($_POST['a']);
        $b = trim($_POST['b']);
        $c = trim($_POST['c']);
        if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
            if ($a > 0 && $b > 0 && $c > 0 && ($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a)) {
                // Tính chu vi
                $chuvi = round($a + $b + $c, 2);

                // Tính diện tích theo công thức Heron
                $s = ($a + $b + $c) / 2;
                $dientich = round(sqrt($s * ($s - $a) * ($s - $b) * ($s - $c)), 2);
            } else {
                $error = "Vui lòng nhập số dương và đảm bảo 3 cạnh tạo thành tam giác!";
                $chuvi = $dientich = "";
            }
        } else {
            $error = "Vui lòng nhập vào số hợp lệ!";
            $chuvi = $dientich = "";
        }
    }
    ?>
    <form align='center' action="" method="post">
        <table>
            <thead>
                <th colspan="2" align="center">
                    <h3>TÍNH DIỆN TÍCH VÀ CHU VI TAM GIÁC</h3>
                </th>
            </thead>
            <tr>
                <td>Cạnh a:</td>
                <td><input type="text" name="a" value="<?php echo $a; ?>" /></td>
            </tr>
            <tr>
                <td>Cạnh b:</td>
                <td><input type="text" name="b" value="<?php echo $b; ?>" /></td>
            </tr>
            <tr>
                <td>Cạnh c:</td>
                <td><input type="text" name="c" value="<?php echo $c; ?>" /></td>
            </tr>
            <tr>
                <td>Chu vi:</td>
                <td><input type="text" name="chuvi" disabled="disabled" value="<?php echo $chuvi; ?>" /></td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td><input type="text" name="dientich" disabled="disabled" value="<?php echo $dientich; ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
            </tr>
        </table>
    </form>
    <?php
    if ($error) {
        echo "<div class='error'>$error</div>";
    }
    ?>
</body>

</html>