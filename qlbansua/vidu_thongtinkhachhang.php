<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Thông tin khách hàng</title>

</head>

<body>

    <?php

    // Kết nối CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());

    $sql = 'SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai FROM khach_hang';
    $result = mysqli_query($conn, $sql);

    echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></p>";
    echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
    echo '<tr>
        <th width="80">Mã khách hàng</th>
        <th width="200">Tên khách hàng</th>
        <th width="">Giới tính</th>
        <th width="300">Địa chỉ</th>
        <th width="80">Điện thoại</th>
    </tr>';

    // Số dòng liên tiếp muốn có cùng một màu
    $soDongLienTiep = 3;
    
    if (mysqli_num_rows($result) != 0) {
        $stt = 1;

        while ($rows = mysqli_fetch_array($result)) {
            // Xác định màu nền
            $bgColor = ((int)(($stt - 1) / $soDongLienTiep) % 2 == 0) ? "#ffffff" : "#f2f2f2";

            echo "<tr style='background-color: $bgColor;'>";
                echo "<td>{$rows['Ma_khach_hang']}</td>";
                echo "<td>{$rows['Ten_khach_hang']}</td>";
                // Hiển thị hình ảnh cho giới tính
                if ($rows['Phai'] == 0) {
                    echo "<td><img src='Nam-Nu/nam.jpg' alt='Nam' style='width:50px;height:50px;'></td>"; // Nam
                } else {
                    echo "<td><img src='Nam-Nu/nu.jpg' alt='Nữ' style='width:50px;height:50px;'></td>"; // Nữ
                }
                echo "<td>{$rows['Dia_chi']}</td>";
                echo "<td>{$rows['Dien_thoai']}</td>";
            echo "</tr>";

            $stt += 1;
        }
    }

    echo "</table>";

    ?>

</body>

</html>
