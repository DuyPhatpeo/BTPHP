<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả xổ số</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
            color: #343a40;
        }
        h2 {
            text-align: center;
            color: #495057;
            margin-top: 40px;
            font-size: 24px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
        }
        table {
            width: 80%;
            max-width: 600px;
            margin: 40px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #f1f1f1;
            color: #495057;
            font-size: 18px;
        }
        td {
            font-size: 16px;
        }
        .special {
            color: #e74c3c;
            font-weight: bold;
            font-size: 20px;
        }
        .bold {
            font-weight: bold;
            color: #2c3e50;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
            color: #6c757d;
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

function taoKetQua($soChuSo) {
    $ketQua = "";
    for ($i = 0; $i < $soChuSo; $i++) {
        $ketQua .= rand(0, 9);
    }
    return $ketQua;
}

function taoNhieuKetQua($soChuSo, $soLan) {
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
    <p>&copy; 2024 Trần Duy Phát. Tất cả các quyền được bảo lưu.</p>
</footer>

</body>
</html>
