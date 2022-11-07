<?php
require "conn.php";
  $PlateNumber = $_POST['PlateNumber'];
  $CrimeType = $_POST['CrimeType'];
  $CrimeSection = $_POST['CrimeSection'];
  $Message = $_POST['Message'];
  $LicenseNumber = $_POST['LicenseNumbers'];
  $crimelocation = $_POST['crimelocation'];
  $code = $_POST['Code'];
  $Region = $_POST['Region'];
  $officername = $_POST['OfficerName11'];


  $sql = " SELECT * FROM driver WHERE License_number = '$LicenseNumber'";
  $result0 = mysqli_query($conn,$sql);
  $response = array();
  $response1 = array();

if (mysqli_num_rows($result0)>0)
  {
      $sql1 = "SELECT * FROM crime WHERE License_number = '$LicenseNumber'";
      $result1 = mysqli_query($conn,$sql1);

      if (mysqli_num_rows($result1)>0) {

        $code = "crime_before";
        $Message = "Driver has a Record Before";
        array_push($response1,array("code"=>$code,"Message"=>$Message));
        echo json_encode($response1);

        $sqlb = " INSERT INTO crime (Crime_Type,Crime_Section,Location,Details,License_number,officer_Name) VALUES
         ('$CrimeType','$CrimeSection','$crimelocation','$Message','$LicenseNumber','$officername') ";
         $resultb = mysqli_query($conn,$sqlb);

      }else{

        $sql2 = "INSERT INTO crime (Crime_Type,Crime_Section,Location,Details,License_number,officer_Name)VALUES
        ('$CrimeType','$CrimeSection','$crimelocation','$Message','$LicenseNumber','$officername')";
        $result2 = mysqli_query($conn,$sql2);

        if($result2>0)
        {
          $sql3 = "SELECT * FROM crime WHERE License_number = '$LicenseNumber' ";
          $result3 = mysqli_query($conn,$sql3);

          if(mysqli_num_rows($result3))
          {
            $row = mysqli_fetch_row($result3);
            $crimeId = $row['0'];

            $sql4 = "INSERT INTO car (Car_plate_number,Plate_Code,Plate_Region,Crime_Id)VALUES
            ('$PlateNumber','$code','$Region','$crimeId')";
            $result4 = mysqli_query($conn,$sql4);

            $sql5 = "UPDATE driver SET Crime_Id='$crimeId' WHERE License_number = '$LicenseNumber'";
            $result5 = mysqli_query($conn,$sql5);

            if ($result4 && $result5) {
              $code = "Success";
              $Message = "Registeration is Successfull.";
              array_push($response1,array("code"=>$code,"Message"=>$Message));
              echo json_encode($response1);
            }else{

              $code = "Report_UnSuccessful";
              $Message = "Registeration is UnSuccessfull.";
              array_push($response1,array("code"=>$code,"Message"=>$Message));
              echo json_encode($response1);

            }
          }else{
            $code = "LicenseNumber_is_not_found";
            $Message = "LicenseNumber is not Found";
            array_push($response1,array("code"=>$code,"Message"=>$Message));
            echo json_encode($response1);

          }
        }
        else{
          $code = "Crime_Registeration_Failed";
          $Message = "Crime Registeration Failed";
          array_push($response1,array("code"=>$code,"Message"=>$Message));
          echo json_encode($response1);
        }
}
}
else{
  $code = "Driver_is_Not_Found";
  $Message = " The LicenseNumber is Not Registered Yet";
  array_push($response,array("code"=>$code,"Message"=>$Message));
  echo json_encode($response);

}mysqli_close($conn);
?>
