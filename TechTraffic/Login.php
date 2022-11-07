<?php
require "conn.php";
  $phone = "+2519";
  $password = "Google";
  $sql = "SELECT * FROM officer WHERE officer_phone='$phone'AND officer_Password='$password'";
  $result = mysqli_query($conn,$sql);
  $response = array();

if (mysqli_num_rows($result)) {
  $row = mysqli_fetch_row($result);
  $officerName = $row[1];
  $OfficerPhone = $row[2];
  $code = "Login_Success";
  array_push($response,array("code"=>$code,"OfficerName"=>$officerName,"OfficerPhone"=>$OfficerPhone));
  echo json_encode($response);
  // code...
}
else{
  $code = "Login_Failed";
  $Message = "Officer is not Found! Try Again Lator";
  array_push($response,array("code"=>$code,"message"=>$Message));
  echo json_encode($response);

}
mysqli_close($conn);

?>
