<?php 

    header('Access-Control-Allow-Origin:*');

    $servename = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'ionicapp';

    $connect = new mysqli($servename, $username, $password, $dbname);
    $connect->set_charset('utf8');
    
    if($connect->connect_error){
        die ("การเชื่อมต่อพลาด : ".$connect->connect_error);
    }

  $sql = "select * from customers"; 
  $result = $connect->query($sql);

  if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
       $data[] = $row;

   }
   echo json_encode($data);
  }else{
   echo "ไม่มีข้อมูล";
  }

$connect->close();

?>