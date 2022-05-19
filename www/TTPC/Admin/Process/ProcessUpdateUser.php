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

include_once "..\Config\Include.php";

$conn = new mysqli ($host, $my_user, $my_password, $my_db);

if($conn==false)
{
  die("A connection error has occured");
}

if(isset($_POST['UpdateUser']))
{
  $ID= $_POST['MemID'];
  $FstName=$_POST['FirstName'];
  $LstName=$_POST['LastName'];
  $Addr=$_POST['Address'];
  $PstCd=$_POST['Postcode'];
  $PhnNum=$_POST['PhoneNumber'];
  $PsWrd= md5 ($_POST['Password']);
  $Priv=$_POST['Priviledge'];

  $query="UPDATE `tblmembers` SET `fldFstName`='$FstName',`fldLstName`= '$LstName',`fldAddress`= '$Addr',`fldPstCd`='$PstCd',`fldPhoneNum`='$PhnNum', `fldPriv`='$Priv',`fldPassWrd`='$PsWrd' WHERE `fldMemID`='$ID'";
  $result=mysqli_query($conn,$query);

if($result)
{
  $_SESSION['messageupdate'] ='User details updated successfully';
  header("location: ../../AdminMemberships.php");
}


}


 ?>
