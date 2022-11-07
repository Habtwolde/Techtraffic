<?php
require "../conn.php";
$sql1 = " SELECT * FROM violation_report ORDER BY Id DESC";
$result = mysqli_query($conn,$sql1);
$response = array();
while($row = mysqli_fetch_array($result)){
    array_push($response,array("PlaateNumber"=>$row['3'], "code"=>$row['4'],
    "CrimeSection"=>$row['2'],"CrimeTYpe"=>$row['1'],"Region"=>$row['5'],"Priority"=>$row['9']));
}
echo json_encode(array("Server_Response"=>$response));
mysqli_close($conn);
?>
