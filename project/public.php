<?php
session_start();
error_reporting(0);
if (!isset($_SESSION["cartItems"])) {
    $_SESSION["cartItems"] = 0;
}

// This function will retrieve data relating to a specific book
// It should be called using the $db object and one bookId
// It will return one array containing fields for the specified book
function getBookDetails($bookId){
    if ($bookId > 2000 && $bookId < 3000) {
        $path = "data/scenery.txt";
        $file = fopen($path, "r");
        $data = array();
        $i = 0;
        while(! feof($file))
        {
            $data[$i]= fgets($file);
            $i++;
        }
        fclose($file);
        $data=array_filter($data);
        foreach($data as $k=>$v){
            $str = explode("|",$v);
            if ($str[0] == $bookId){
                $row[0] = $str[1];
                $row[1] = $str[2];
                break;
            }
        }
    } else if($bookId > 1000 && $bookId < 2000) {
        $path_h = "data/hotel.txt";
        $file_h = fopen($path_h, "r");
        $data_h = array();
        $i_h = 0;
        while(! feof($file_h))
        {
            $data_h[$i_h]= fgets($file_h);
            $i_h++;
        }
        fclose($file_h);
        $data_h=array_filter($data_h);
        foreach($data_h as $k=>$v){
            $str_h = explode("|",$v);
            if ($str_h[0] == $bookId){
                $row[0] = $str_h[1];
                $row[1] = $str_h[4];
            }
        }
    }else if($bookId > 3000 && $bookId < 4000) {
        $path_s = "data/share.txt";
        $file_s = fopen($path_s, "r");
        $data_s = array();
        $i_s = 0;
        while(! feof($file_s))
        {
            $data_s[$i_s]= fgets($file_s);
            $i_s++;
        }
        fclose($file_s);
        $data_h=array_filter($data_s);
        foreach($data_s as $k=>$v){
            $str_s = explode("|",$v);
            if ($str_s[0] == $bookId){
                $row[0] = $str_s[2];
                $row[1] = $str_s[1];
            }
        }
    }
    return $row;
}

$path = "data/scenery.txt";
$file = fopen($path, "r");
$data = array();
$i = 0;
while(! feof($file))
{
    $data[$i]= fgets($file);
    $i++;
}
fclose($file);
$data=array_filter($data);
$a = 0;
$b = 0;
foreach($data as $k=>$v){
    $str = explode("|",$v);
    if ($str[3] == "Insurance"){
        $str_arr1[$a] = $str;
        $a++;
    }else{
        $str_arr2[$b] = $str;
        $b++;
    }
}
$path = "data/hotel.txt";
$file = fopen($path, "r");
$data = array();
$i = 0;
while(! feof($file))
{
    $data[$i]= fgets($file);
    $i++;
}
fclose($file);
$data_h=array_filter($data);

foreach($data_h as $k=>$v){
    $str = explode("|",$v);
    $str_h_arr[$k] = $str;
}

$path = "data/share.txt";
$file = fopen($path, "r");
$data = array();
$i = 0;
while(! feof($file))
{
    $data[$i]= fgets($file);
    $i++;
}
fclose($file);
$data=array_filter($data);
$a = 0;
$b = 0;
foreach($data as $k=>$v){
    $str = explode("|",$v);
    if ($str[2] == "scenery"){
        $str_arr_scenery[$a] = $str;
        $a++;
    }else{
        $str_arr_food[$b] = $str;
        $b++;
    }
}
?>


