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
include_once "Admin\Headers\HeaderCSS.php";
include_once "Admin\Headers\UserHeader.php";
include_once "Admin\Config\Include.php";
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
  <h2> Heres your gallery <?php echo $_SESSION['FstName'] , " ", $_SESSION['LstName'];?>  </h2>
  <h3>
    <?php
    $conn = new mysqli($host, $my_user, $my_password, $my_db);
    $ID= $_SESSION['UserID'];

    $result = $conn -> query ("SELECT `fldImgLoc`, `fldImgTitle` FROM `tblimages` WHERE `fldImgOwner`= '$ID' ");

    While ($row = $result -> fetch_assoc())
    {
      ?>
      <!-- the server parser cannot understand html and will return a parse error if the php is not ended before the return function-->
      <img src = "<?php echo $row ["fldImgLoc"]; ?>" alt=" <?php echo  $row["fldImgTitle"]?>" width ="597" height="431">

     <?php
     //below piece adds an image while the condition is true e.g continues to add one image until there are 5 images then the condition will return false and it will stop.
    }
     ?>

       </h3>
  </div>
</div>

<?php include_once "Admin\Headers\Footer.php"; ?>
</Body>
