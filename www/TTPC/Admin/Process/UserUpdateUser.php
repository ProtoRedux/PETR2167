<?php

 session_start();

if(!isset($_SESSION['UserID']))
{
header('Location: Login.php');
}
elseif ($_SESSION['fldPriv']=="Administrator")
 {
  header('Location: Login.php');
}
include_once "..\Config\Include.php";
$conn = new mysqli ($host, $my_user, $my_password, $my_db);

if($conn==false)
{
  die("A connection error has occured");
}


if(isset($_POST['Update']))
{
  $ID= $_SESSION['UserID'];
  $FstName=$_POST['FstName'];
  $LstName=$_POST['LstName'];
  $Addr=$_POST['Addrs'];
  $PstCd=$_POST['PstCd'];
  $PhnNum=$_POST['TelPhn'];
  $PsWrd= md5 ($_POST['Password']);

  $query="UPDATE `tblmembers` SET `fldFstName`='$FstName',`fldLstName`= '$LstName',`fldAddress`= '$Addr',`fldPstCd`='$PstCd',
  `fldPhoneNum`='$PhnNum', `fldPassWrd`='$PsWrd' WHERE `fldMemID`='$ID'";
  $result=mysqli_query($conn,$query);

  if($result)
  {
    $_SESSION['messageupdateuser'] ='User details updated successfully';
    header("location: ../../UserInfo.php");
  }


  }



?>
