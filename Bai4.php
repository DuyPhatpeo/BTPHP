<?php
    $n = rand(-50, 50);
    echo "Số tự nhiên n là: $n<br>";
    
    if ($n < 0) {
        $n = abs($n);
        echo "Số đối là: $n <br>";
    }

    $mang = [];
    for ($i = 0; $i < $n; $i++) {
        $mang[] = rand(-100, 99);
    }

    echo "Mảng được tạo: <br>";
    
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    

    // Dòng chứa giá trị
    echo "<tr>";
    for ($i = 0; $i < $n; $i++) {
        echo "<td>" . $mang[$i] . "</td>";
    }
    echo "</tr>";
    
    echo "</table>";

    // Tính tổng các phần tử ở vị trí lẻ
    $sum = 0;
    for ($i = 1; $i < $n; $i += 2) { 
        $sum += $mang[$i];
    }

    echo "Tổng các phần tử ở vị trí lẻ: $sum<br>";

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($mang[$j] > $mang[$j + 1]) {
                $temp = $mang[$j];
                $mang[$j] = $mang[$j + 1];
                $mang[$j + 1] = $temp;
            }
        }
    }

    echo "Mảng đã sắp xếp theo thứ tự tăng dần: <br>";
    
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    

    echo "<tr>";
    for ($i = 0; $i < $n; $i++) {
        echo "<td>" . $mang[$i] . "</td>";
    }
    echo "</tr>";
    
    echo "</table>";
?>
