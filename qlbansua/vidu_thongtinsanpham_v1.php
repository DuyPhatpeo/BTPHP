<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin các sản phẩm</title>
</head>

<body>

    <?php
    // Kết nối cơ sở dữ liệu
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());

    $sql = "SELECT Ten_sua, Trong_luong, Don_gia, Hinh, ten_loai, Ten_hang_sua FROM sua, hang_sua, loai_sua Where Sua.Ma_hang_sua = Hang_sua.Ma_hang_sua and Sua.Ma_loai_sua = Loai_sua.Ma_loai_sua;";
    $result = mysqli_query($conn, $sql);

    echo "<p align='center'><font size='5' color='orange'>THÔNG TIN CÁC SẢN PHẨM</font></p>";
    echo "<table align='center' border='1' cellpadding='2' cellspacing='2' width='600'>";

    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td><img src='Hinh_sua/{$row['Hinh']}' width='100'></td>";
            echo "<td>";
            echo "<b>{$row['Ten_sua']}</b><br>";
            echo "Nhà sản xuất: {$row['Ten_hang_sua']}<br>";
            echo "{$row['ten_loai']} - {$row['Trong_luong']} gr - " . number_format($row['Don_gia'], 0, ',', '.') . " VND";
            echo "</td>";
            echo "</tr>";
        }
    }

    echo "</table>";

    mysqli_close($conn);
    ?>

</body>

</html>