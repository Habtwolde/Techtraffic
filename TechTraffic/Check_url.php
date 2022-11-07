<?php
require "conn.php";
$licenumber3 = $_POST['licenumber3'];

  $sql = "SELECT * FROM driver WHERE License_number = '$licenumber3'";
  $result = mysqli_query($conn,$sql);
  $response = array();
  $response1 = array();

if (mysqli_num_rows($result)>0) {

  $code = "License_is_found";
  $Message = "License is Orginal";
  array_push($response,array("code"=>$code,"Message"=>$Message));
  echo json_encode($response);
}
else{
    $code = "License_is_Not_found";
    $Message = "Fake License Alert! check it Again";
    array_push($response1,array("code"=>$code,"Message"=>$Message));
    echo json_encode($response1);


}
mysqli_close($conn);

?>
