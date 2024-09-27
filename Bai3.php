<?php    
    function laSoNguyenTo($so) {
        if ($so <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($so); $i++) {
            if ($so % $i == 0) {
                return false;
            }
        }
        return true;
    }
    $n = rand(1, 10000);


    if (laSoNguyenTo($n)) {
        echo "$n là số nguyên tố.";
    } else {
        echo "$n không phải là số nguyên tố.";
    }

    function tongSoLeHaiChuSo($n) {
        $tong = 0;
        for ($i = 11; $i < $n && $i < 100; $i += 2) { 
            $tong += $i;
        }
        
        return $tong;
    }

    echo "<br>Tổng các số lẻ có 2 chữ số và nhỏ hơn $n là:" . tongSoLeHaiChuSo($n);

    function demChuSo($n) {
        $dem = 0;
    
        if ($n == 0) {
            return 1; 
        }

        while ($n > 0) {
            $n = (int)($n / 10); 
            $dem++;
        }
        
        return $dem;
    }
    echo "<br> Số n có " . demChuSo($n) . " chữ số.<br>";
?>