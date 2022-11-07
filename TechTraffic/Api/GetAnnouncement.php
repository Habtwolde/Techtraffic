<?php
require "../conn.php";
$sql1 = " SELECT * FROM announcement_table ORDER BY Annnouncement_ID DESC ";
$result = mysqli_query($conn,$sql1);
$response = array();
while($row = mysqli_fetch_array($result)){
  array_push($response,array("Announcement_title"=>$row['1'], "Announcement_details"=>$row['2']));

}
echo json_encode(array("Server_Response"=>$response));
mysqli_close($conn);
?>
