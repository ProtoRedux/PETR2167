<?php
session_start();
if(!isset($_SESSION['UserID']))
{
header('Location: Login.php');
}
elseif ($_SESSION['fldPriv']=="user")
{
 header('Location: Login.php');
}
include_once "../Config/Include.php";

$conn = new mysqli ($host, $my_user, $my_password, $my_db);

if($conn==false)
{
  die("A connection error has occured");
}

if(isset($_POST['AddUser']))
{
  $FstName=$_POST['FirstName'];
  $LstName=$_POST['LastName'];
  $Addr=$_POST['Address'];
  $PstCd=$_POST['Postcode'];
  $PhnNum=$_POST['PhoneNumber'];
  $PsWrd= md5 ($_POST['Password']);
  $Priv="User";
  $check="SELECT * FROM `tblmembers` WHERE `fldFstName`= '$FstName' AND `fldLSTName` = '$LstName' ";
  $check_user=mysqli_query($conn,$check);
  $row_count=mysqli_num_rows($check_user);


if ($row_count==1)
  {
  echo "This user already appears to exist";
  }

else {

$sql = "INSERT INTO `tblmembers`(`fldFstName`,`fldLstName`,`fldAddress`,`fldPstCd`,`fldPhoneNum`,`fldPriv`,`fldPassWrd`) VALUES ('$FstName','$LstName','$Addr','$PstCd','$PhnNum', '$Priv','$PsWrd')";

$result= mysqli_query($conn,$sql);

      if($result)
      {

        header("location: ../../AdminMemberships.php ");
      }
    else {
          echo "upload failed";
          }
    }
}
 ?>
