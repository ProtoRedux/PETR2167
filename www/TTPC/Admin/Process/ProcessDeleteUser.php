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

if($_GET['User_ID'])
{
  $user_id=$_GET['User_ID'];

  $sql="DELETE FROM `tblmembers` WHERE `fldMemID`= '$user_id' ";

  $result=mysqli_query($conn,$sql);

  if ($result)
  {
    $_SESSION['message'] ='User Deletion Successful';
    header("location: ../../AdminMemberships.php");
  }

}


 ?>
