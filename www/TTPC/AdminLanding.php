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
include_once "Admin\Headers\HeaderCSS.php";
include_once "Admin\Headers\AdminHeader.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Taw & Torridge Photography club</title>
</head>
<body>

<div class="row">
  <div class="container-fluid">
    <h1>Welcome <?php echo $_SESSION['FstName'] , " ", $_SESSION['LstName'];;?></h1>
  </div>
</div>

<div class="row">
  <div class="container">

  </div>
</div>


   <?php include_once '\Admin\Headers\Footer.php'; ?>

</body>
