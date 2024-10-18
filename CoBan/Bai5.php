<?php
function taoMaTran($m, $n)
{
    $maTran = [];
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $maTran[$i][$j] = rand(-100, 99);
        }
    }
    return $maTran;
}

function inMaTran($maTran)
{
    echo "<table border='1' cellspacing='0' cellpadding='5' style='border-collapse: collapse; text-align: center; font-family: Arial, sans-serif;'>";
    foreach ($maTran as $hang) {
        echo "<tr style='background-color: #f2f2f2;'>";
        foreach ($hang as $phanTu) {
            echo "<td style='padding: 10px;'>" . ($phanTu < 0 ? "<span style='color: red;'>$phanTu</span>" : $phanTu) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Khởi tạo kích thước ngẫu nhiên cho ma trận
$m = rand(2, 5);
echo "<h2>Số hàng (m): $m</h2>";
$n = rand(2, 5);
echo "<h2>Số cột (n): $n</h2>";

$maTran = taoMaTran($m, $n);
echo "<h3>Ma trận ban đầu:</h3>";
inMaTran($maTran);

function thayAmThanh0(&$maTran)
{
    for ($i = 0; $i < count($maTran); $i++) {
        for ($j = 0; $j < count($maTran[$i]); $j++) {
            if ($maTran[$i][$j] < 0) {
                $maTran[$i][$j] = 0;
            }
        }
    }
}

thayAmThanh0($maTran);
echo "<h3>Ma trận sau khi thay thế các phần tử âm thành 0:</h3>";
inMaTran($maTran);
