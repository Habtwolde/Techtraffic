<?php
require "conn.php";
  $PlateNumber = $_POST['PlateNumber'];
  $Codde = $_POST['Code'];
  $Region = $_POST['Region'];
  $CrimeType3 = $_POST['CrimeType3'];
  $CrimeSection3 = $_POST['CrimeSection3'];
  $Priority = $_POST['Priority'];
  $officername = $_POST['OfficerName11'];
  $Date = $_POST['Date'];

  $sql = "INSERT INTO violation_report (Car_plate_number,code,Region,ReportType,Crime_section,Priority,Officer_name,Dafe) VALUES
   ('$PlateNumber','$Codde','$Region','$CrimeType3','$CrimeSection3','$Priority','$officername','$Date')";
  $result = mysqli_query($conn,$sql);
  $response = array();
  $response1 = array();

if ($result) {

  $code = "All_Officers_are_notified!";
  $Message = "Violated Reported Successfully";
  array_push($response,array("code"=>$code,"Message"=>$Message));
  echo json_encode($response);
  // code...
}
else{
    $code = "Unabel_to_Notify";
    $Message = "Unable to Notify Right now";
    array_push($response1,array("code"=>$code,"Message"=>$Message));
    echo json_encode($response1);
}
mysqli_close($conn);

?>
