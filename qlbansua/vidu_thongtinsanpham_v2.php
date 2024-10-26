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

    // Truy vấn dữ liệu từ các bảng
    $sql = "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, Hinh FROM sua";
    $result = mysqli_query($conn, $sql);

    // In tiêu đề bảng
    echo "<p align='center'><font size='5' color='orange'>THÔNG TIN CÁC SẢN PHẨM</font></p>";

    // Căn giữa bảng
    echo "<table align='center' border='1' cellpadding='2' cellspacing='2' width='60%'>";

    $count = 0;
    echo "<tr>"; // Bắt đầu hàng đầu tiên

    // Duyệt qua từng sản phẩm
    while ($row = mysqli_fetch_array($result)) {
        // Hiển thị mỗi sản phẩm trong một cột
        echo "<td align='center'>";
        echo "<b>{$row['Ten_sua']}</b><br>";
        echo "{$row['Trong_luong']} gr - ";
        echo number_format($row['Don_gia'], 0, ',', '.') . " VND<br>";
        echo "<img src='Hinh_sua/{$row['Hinh']}' width='100'><br>";
        echo "</td>";
        $count++;
        if ($count % 6 == 0) {
            echo "</tr><tr>"; // Mở hàng mới sau mỗi 6 sản phẩm
        }
    }

    echo "</tr></table>"; // Đóng hàng và bảng
    ?>

</body>
</html>
