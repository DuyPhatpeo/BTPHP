<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Thông tin hãng sữa</title>

</head>

<body>

    <?php

    // Kết nối CSDL
    // require("connect.php");
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());

    $sql = 'SELECT Ma_hang_sua, Ten_hang_sua, Dia_chi, Dien_thoai, Email FROM hang_sua';
    $result = mysqli_query($conn, $sql);

    echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></p>";
    echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
    echo '<tr>
        <th width="50">STT</th>
        <th width="50">Mã hãng sữa</th>
        <th width="200">Tên hãng sữa</th>
        <th width="200">Địa chỉ</th>
        <th width="50">Điện thoại</th>
        <th width="100">Email</th>
    </tr>';

    if (mysqli_num_rows($result) != 0) {
        $stt = 1;

        while ($rows = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td>{$rows['Ma_hang_sua']}</td>";
            echo "<td>{$rows['Ten_hang_sua']}</td>";
            echo "<td>{$rows['Dia_chi']}</td>";
            echo "<td>{$rows['Dien_thoai']}</td>";
            echo "<td>{$rows['Email']}</td>";
            echo "</tr>";

            $stt += 1;
        }
    }

    echo "</table>";

    ?>

</body>

</html>
