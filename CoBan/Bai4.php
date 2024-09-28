<?php
    // Khởi tạo biến ngẫu nhiên
    $n = rand(-50, 50);
    echo "<h2>Số tự nhiên n là: $n</h2>";
    
    if ($n < 0) {
        $n = abs($n);
        echo "<h3>Số đối là: $n</h3>";
    }

    // Tạo mảng ngẫu nhiên
    $mang = [];
    for ($i = 0; $i < $n; $i++) {
        $mang[] = rand(-100, 99);
    }

    echo "<h3>Mảng được tạo:</h3>";
    
    // Hiển thị mảng dưới dạng bảng
    echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    for ($i = 0; $i < $n; $i++) {
        echo "<td style='text-align: center; font-family: Arial, sans-serif;'>" . $mang[$i] . "</td>";
    }
    echo "</tr>";
    echo "</table>";

    // Tính tổng các phần tử ở vị trí lẻ
    $sum = 0;
    for ($i = 1; $i < $n; $i += 2) { 
        $sum += $mang[$i];
    }

    echo "<h3>Tổng các phần tử ở vị trí lẻ: $sum</h3>";

    // Sắp xếp mảng theo thứ tự tăng dần
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($mang[$j] > $mang[$j + 1]) {
                // Hoán đổi vị trí
                $temp = $mang[$j];
                $mang[$j] = $mang[$j + 1];
                $mang[$j + 1] = $temp;
            }
        }
    }

    echo "<h3>Mảng đã sắp xếp theo thứ tự tăng dần:</h3>";
    
    // Hiển thị mảng đã sắp xếp dưới dạng bảng
    echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    for ($i = 0; $i < $n; $i++) {
        echo "<td style='text-align: center; font-family: Arial, sans-serif;'>" . $mang[$i] . "</td>";
    }
    echo "</tr>";
    echo "</table>";
?>
