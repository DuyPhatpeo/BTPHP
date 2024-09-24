<?php
    // $a = 5;
    // echo "Gia tri cua a la $a. <br>";
    // echo 'Gia tri cua a la $a. <br>' ;
    // echo 'Gia tri cua a la ' .$a ;

    // $a = 1;
    // function Test(){
    //     $a = 10;
    //     echo $a;
    // }
    // Test();
    // echo $a;

    // function Test(){
    //     static $a = 0;
    //     echo $a;
    //     $a++;
    // }
    // Test();
    // Test();
    // Test();

    // $str1 = "Lap";
    // $str2 = &$str1;
    // echo $str1;
    // echo $str2;

    // define("PI",3.14);
    // echo PI;
    // define("Lop","dhdhhd");
    // echo Lop;
    
    // $a = true;
    // // $a = (int)$a;
    // $b = (int)$a;
    // echo $a;
    // echo $b;

    // $a=5;
    // $b="5";
    // if($a==$b)
    //     echo "Y";
    // else
    //     echo "N";
    // if($a===$b)
    //     echo "Y";
    // else
    //     echo "N";

    // $i =1;
    // while($i <= 10)
    // {
    //     echo "$i \t";
    //     $i++;
    // }
// Bài tập 1
    // $n = rand(1,100);
    // echo "Giá trị n là n $n.<br>";
    // echo "Các số chẳn < $n là: ";
    // for($i = 1;$i <= $n;$i++)
    //     if($i%2==0)
    //         echo "$i  ";

    // $n = rand(1,10);
    // echo "Giá trị n là n $n.<br>";
    // echo "Bảng cửu chương  $n: ";
    // for($i = 1;$i <= $n;$i++){
    //         $kq = $i*$n; 
    //         echo "$i * $n = $kq<br>";
    // }

    // bài 2

    // for($n=1;$n<=10;$n++){
    //     echo "Bảng cửu chương  $n: <br>";
    //     for($i = 1;$i <= 10;$i++){
    //         $kq = $i*$n; 
    //         echo "$i * $n = $kq<br>";
    //     }
    // }

    // Bài 3

    
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