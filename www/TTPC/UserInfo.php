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

$conn = new mysqli ($host, $my_user, $my_password, $my_db);
$ID= $_SESSION['UserID'];
$sql= "SELECT * FROM `tblmembers` WHERE `fldMemID` = '$ID' ";
$result= mysqli_query($conn,$sql);
$info= $result -> fetch_assoc();




?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Taw & Torridge Photography club</title>
</head>



<Body>
  <div class="container d-flex justify-content-center">
       <h2>
          <?php
               error_reporting(0);
              if($_SESSION['messageupdateuser'])
              {
                echo $_SESSION['messageupdateuser'];
              }
              unset($_SESSION['messageupdateuser']);

           ?>
       </h2>
</div>
<div class="container d-flex justify-content-center
        align-items-center"
        style= "min-height: 80vh">
          <form action="Admin\Process\UserUpdateUser.php" method="post" class= "border shadow p-3 rounded"
                  style="width:450px">
                  <h1 class="text-center"> Check Your current Details </h1>
            <div class="mb-3">
              <label for="FstName"
                      class="form-label">First Name</label>
              <input type="text"
                      Name="FstName"
                      class="form-control"
                      id="FstName"
                      value= "<?php echo "{$info['fldFstName']}" ?>">
                              </div>

                      <div class="mb-3">
                        <label for="LstName"
                                class="form-label">Last Name</label>
                        <input type="text"
                                Name="LstName"
                                class="form-control"
                                id="LstName"
                                value= "<?php echo "{$info['fldLstName']}" ?>">
                                          </div>
					 <div class="mb-3">
                        <label for="Addrs"
                                class="form-label">Address</label>
                        <input type="text"
                                Name="Addrs"
                                class="form-control"
                                id="Addrs"
                                value="<?php echo "{$info['fldAddress']}" ?>">
                                          </div>
					 <div class="mb-3">
                        <label for="PstCd"
                                class="form-label">Post Code</label>
                        <input type="text"
                                Name="PstCd"
                                class="form-control"
                                id="PstCd"
                                value="<?php echo "{$info['fldPstCd']}" ?>">
                                          </div>
					<div class="mb-3">
                        <label for="TelPhn"
                                class="form-label">Telephone Number</label>
                        <input type="text"
                                Name="TelPhn"
                                class="form-control"
                                id="TelPhn"
                                value="<?php echo "{$info['fldPhoneNum']}" ?>">
                                          </div>
					<div class="mb-3">
                        <label for="password"
                                class="form-label">Password</label>
                        <input type="password"
                                Name="password"
                                class="form-control"
                                id="password"
                                value="<?php echo "{$info['fldPassWrd']}" ?>">
                                          </div>

            <button type="submit" class="btn btn-primary"name="Update" value="Update">Update</button>
          </form>
        </div>



<?php include_once "Admin\Headers\Footer.php"; ?>
</body>
