<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tính diện tích HCN</title>
    <style type="text/css">
        body {
            background-color: #121212;
            font-family: Arial, sans-serif;
            color: #f0f0f0;
        }

        table {
            background: #1e1e1e;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
            margin: 50px auto;
        }

        thead {
            background: #4CAF50;
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
            color: #f0f0f0;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h3 {
            font-family: Verdana, sans-serif;
            text-align: center;
            color: #f0f0f0;
            font-size: 18px;
        }

        .error {
            color: #ff6666;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php
    $chieudai = $chieurong = $dientich = $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $chieudai = trim($_POST['chieudai']);
        $chieurong = trim($_POST['chieurong']);
        if (is_numeric($chieudai) && is_numeric($chieurong)) {
            if ($chieudai > 0 && $chieurong > 0) {
                $dientich = round($chieudai * $chieurong, 2);
            } else {
                $error = "Vui lòng nhập số dương!";
                $dientich = "";
            }
        } else {
            $error = "Vui lòng nhập vào số hợp lệ!";
            $dientich = "";
        }
    }
    ?>
    <form align='center' action="" method="post">
        <table>
            <thead>
                <th colspan="2" align="center">
                    <h3>TÍNH DIỆN TÍCH HÌNH CHỮ NHẬT</h3>
                </th>
            </thead>
            <tr>
                <td>Chiều dài:</td>
                <td><input type="text" name="chieudai" value="<?php echo $chieudai; ?>" /></td>
            </tr>
            <tr>
                <td>Chiều rộng:</td>
                <td><input type="text" name="chieurong" value="<?php echo $chieurong; ?>" /></td>
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