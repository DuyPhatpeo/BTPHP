<?php
function taoMaTran($m, $n) {
    $maTran = [];
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $maTran[$i][$j] = rand(-100, 99);
        }
    }
    return $maTran;
}

function inMaTran($maTran) {
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    foreach ($maTran as $hang) {
        echo "<tr>";
        foreach ($hang as $phanTu) {
            echo "<td>$phanTu</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

$m = rand(2, 5);
echo "Số m: $m<br>";    
$n = rand(2, 5);
echo "Số n: $n<br>";

$maTran = taoMaTran($m, $n);
echo "Ma trận ban đầu: <br>";
inMaTran($maTran);

function thayAmThanh0(&$maTran) {
    for ($i = 0; $i < count($maTran); $i++) {
        for ($j = 0; $j < count($maTran[$i]); $j++) {
            if ($maTran[$i][$j] < 0) {
                $maTran[$i][$j] = 0;
            }
        }
    }
}

thayAmThanh0($maTran);
echo "Ma trận sau khi thay thế các phần tử âm thành 0:<br>";
inMaTran($maTran);
?>
