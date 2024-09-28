<?php
    for($n=1;$n<=10;$n++){
        echo "Bảng cửu chương  $n: <br>";
        for($i = 1;$i <= 10;$i++){
            $kq = $i*$n; 
            echo "$i * $n = $kq<br>";
        }
    }
?>