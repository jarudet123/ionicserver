<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ionicapp';

$connect = new mysqli($servername, $username, $password, $dbname);
$connect->set_charset('utf8');

if($connect->connect_error){
    die("การเชื่อมต่อผิดพลาด  :".$connect->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

if(count($data) > 0){
    $c_id = $data["c_id"];
    $c_name = $data["c_name"];
    $c_name = $data["c_lastname"];
    $c_price = $data["c_address"];
    $c_detail = $data["c_tai"];

    $sql = "insert into customers
            (c_id, c_name, c_lastname,c_address,c_tai)
        values
            ('$c_id', '$c_name', '$c_lastname', '$c_address','$c_tai')
            ";

    if($connect->query($sql) === TRUE){
        $connect->close();
        return true;
    } else {
        $connect->close();
        return $connect->error;
    }
}

    $connect->close();

?>