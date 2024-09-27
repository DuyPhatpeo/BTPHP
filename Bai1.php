<?php
    $n = rand(1,100);
    echo "Giá trị n là n $n.<br>";
    echo "Các số chẳn < $n là: ";
    for($i = 1;$i <= $n;$i++)
        if($i%2==0)
            echo "$i  ";

    $n = rand(1,10);
    echo "Giá trị n là n $n.<br>";
    echo "Bảng cửu chương  $n: ";
    for($i = 1;$i <= $n;$i++){
            $kq = $i*$n; 
            echo "$i * $n = $kq<br>";
    }
?>