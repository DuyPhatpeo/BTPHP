<?php
// $arr = array("foo"=>"bar",12=>true);
// // echo $arr["foo"];
// // echo "<br>";
// print_r($arr);
// echo "<br>";
// var_dump($arr);
// echo "<br>";
// $brr = array("somearray"=> array(6=>5, 13=>9,"a"=>42));
// // echo $brr["somearray"][13];
// print_r($brr);

// $a = array(5=>1,"address"=>20,100=>"password");
// print_r($a);
// echo "<br>";
// $a[]="hello";
// print_r($a);

// $a = array(5=>1,"address"=>20,100=>"password");
// print_r($a);
// echo "<br>";
// echo"Cac phan tu cua mang: <br>";
// foreach($a as $giatri){
//     echo "$giatri ";
// }

// echo "<br>";
// echo"Cac phan tu va gia tri trong mang: <br>";
// foreach($a as $khoa=> $giatri){
//     echo "$khoa: $giatri <br>";
// }

$str = "CN-T2-T3-T4-T5-T6-T7";
$arr = explode("-", $str);
var_dump($arr);
echo "<br>";
$str = implode(",", $arr);
var_dump($str);
