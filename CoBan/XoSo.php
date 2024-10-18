<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả xổ số</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            margin: 0;
            padding: 0;
            color: #f0f0f0;
        }

        h2 {
            text-align: center;
            color: #ffffff;
            margin-top: 40px;
            font-size: 28px;
            border-bottom: 2px solid #3e3e3e;
            padding-bottom: 10px;
        }

        table {
            width: 80%;
            max-width: 600px;
            margin: 40px auto;
            border-collapse: collapse;
            background-color: #1e1e1e;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        th,
        td {
            border: 1px solid #3e3e3e;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-size: 20px;
        }

        td {
            font-size: 18px;
            color: #f8f9fa;
        }

        .special {
            color: #ff5252;
            font-weight: bold;
            font-size: 22px;
        }

        .bold {
            font-weight: bold;
            color: #ffc107;
        }

        tr:hover {
            background-color: #333333;
            transition: background-color 0.3s ease;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            font-size: 16px;
            color: #b0b0b0;
        }
    </style>
</head>

<body>

    <?php
    $ngay_tieng_viet = array(
        'Monday'    => 'Thứ Hai',
        'Tuesday'   => 'Thứ Ba',
        'Wednesday' => 'Thứ Tư',
        'Thursday'  => 'Thứ Năm',
        'Friday'    => 'Thứ Sáu',
        'Saturday'  => 'Thứ Bảy',
        'Sunday'    => 'Chủ Nhật'
    );

    $thu = date('l');
    $ngay = date('d/m/Y');
    echo "<h2>Xổ Số Kiến Thiết - " . $ngay_tieng_viet[$thu] . ", ngày " . $ngay . "</h2>";

    function taoKetQua($soChuSo)
    {
        $ketQua = "";
        for ($i = 0; $i < $soChuSo; $i++) {
            $ketQua .= rand(0, 9);
        }
        return $ketQua;
    }

    function taoNhieuKetQua($soChuSo, $soLan)
    {
        $ketQua = [];
        for ($i = 0; $i < $soLan; $i++) {
            $ketQua[] = taoKetQua($soChuSo);
        }
        return implode(" - ", $ketQua);
    }

    echo "<table>";
    echo "<tr><th>Giải</th><th>Kết quả</th></tr>";
    echo "<tr><td>G.8</td><td class='bold'>" . taoKetQua(2) . "</td></tr>";
    echo "<tr><td>G.7</td><td>" . taoKetQua(3) . "</td></tr>";
    echo "<tr><td>G.6</td><td>" . taoNhieuKetQua(4, 3) . "</td></tr>";
    echo "<tr><td>G.5</td><td>" . taoKetQua(4) . "</td></tr>";
    echo "<tr><td>G.4</td><td>" . taoNhieuKetQua(5, 7) . "</td></tr>";
    echo "<tr><td>G.3</td><td>" . taoNhieuKetQua(5, 2) . "</td></tr>";
    echo "<tr><td>G.2</td><td>" . taoKetQua(5) . "</td></tr>";
    echo "<tr><td>G.1</td><td>" . taoKetQua(5) . "</td></tr>";
    echo "<tr><td>ĐB</td><td class='special'>" . taoKetQua(6) . "</td></tr>";
    echo "</table>";
    ?>

    <footer>
        <p>&copy; 2024 Trần Duy Phát.</p>
    </footer>

</body>

</html>