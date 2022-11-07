<?php
require "conn.php";
  $officerName = $_POST['officerName'];
  $officer_email = $_POST['officer_email'];
  $officer_phone = $_POST['officer_PhoneNumber'];
  $officer_Password = $_POST['officer_Password'];
  $officer_policestaion = $_POST['officer_policestaion'];
  $officer_badgeNumber = $_POST['officer_badgeNumber'];
  $sql = "SELECT * FROM officer WHERE officer_phone = '$officer_phone' AND officer_Email = '$officer_email'";
  $result = mysqli_query($conn,$sql);
  $response = array();
  $response1 = array();

if (mysqli_num_rows($result)>0) {

  $code = "User_Found";
  $Message = "User Exist";
  array_push($response,array("code"=>$code,"Message"=>$Message));
  echo json_encode($response);
}
else{

  $sql2 = "INSERT INTO officer (officer_name,officer_phone,officer_Password,officer_Email,officer_PoliceStation,officer_BadgeNumber)
  VALUES ('$officerName','$officer_phone','$officer_Password','$officer_email','$officer_policestaion','$officer_badgeNumber')";
  $result1 = mysqli_query($conn,$sql2);
  if($result1>0){
    $code = "Success";
    $Message = "Registeration is Successfull. You Can Login Now";
    array_push($response1,array("code"=>$code,"Message"=>$Message));
    echo json_encode($response1);

  }
}
mysqli_close($conn);

?>
