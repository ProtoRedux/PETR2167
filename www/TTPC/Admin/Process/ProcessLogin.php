<?php
session_start();

$host ="127.0.0.1";
$my_user = "Chaz";
$my_password = "Origin";
$my_db = "ttpc";

$conn = new mysqli ($host, $my_user, $my_password, $my_db);

if($conn==false)
{
  die("A connection error has occured");
}

  $uname = $_POST ['UserID'];
  //$pword = $_POST ['password'];
  $pword = md5($_POST ['password']);

$sql = "SELECT * FROM `tblmembers` WHERE `fldMemID` = '".$uname."' AND `fldPassWrd` = '".$pword."'";

$result = $conn -> query($sql);

$count = mysqli_fetch_array($result);

if($count["fldPriv"]=="User")
{
  $_SESSION ['UserID'] = $count['fldMemID'];
  $_SESSION['fldPriv'] = "User";
  $_SESSION['FstName']= $count['fldFstName'];
  $_SESSION['LstName'] = $count['fldLstName'];
  header ('Location: ../../UserLanding.php');

}
elseif ($count["fldPriv"]=="Administrator")
{
  $_SESSION ['UserID'] = $count['fldMemID'];
  $_SESSION['fldPriv'] = "Administrator";
  $_SESSION['FstName']= $count['fldFstName'];
  $_SESSION['LstName'] = $count['fldLstName'];
  header ('Location: ../../AdminLanding.php');
}

else
{
session_start();
$message= "Username or password is incorrect.<br> Please try again.";
$_SESSION['loginMessage']=$message;
header("location:../../login.php");
}

 ?>
