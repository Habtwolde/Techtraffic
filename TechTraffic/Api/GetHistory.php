<?php
require "../conn.php";
$username = $_POST['UserName'];
$sql1 = " SELECT * FROM violation_report WHERE Officer_name = '$username' ORDER BY Id DESC";
$result = mysqli_query($conn,$sql1);
$response = array();
while($row = mysqli_fetch_array($result)){
    array_push($response,array("PlateNumber"=>$row['3'], "code"=>$row['4'],
    "CrimeSection"=>$row['2'],"CrimeTYpe"=>$row['1'],"Region"=>$row['5'],"Priority"=>$row['9']));
}
echo json_encode(array("Server_Response"=>$response));
mysqli_close($conn);
?>
