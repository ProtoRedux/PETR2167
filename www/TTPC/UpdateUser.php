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
include_once "Admin\Headers\HeaderCSS.php"; include_once "Admin\Headers\AdminHeader.php"; include_once "Admin\Config\Include.php";

$conn = new mysqli ($host, $my_user, $my_password, $my_db);

if($conn==false)
{
  die("A connection error has occured");
}

$ID= $_GET['User_ID'];
$sql= "SELECT * FROM `tblmembers` WHERE `fldMemID` = '$ID' ";
$result= mysqli_query($conn,$sql);
$info= $result -> fetch_assoc();



 ?>

<body>
 <h1>Update user</h1>
   <form class="" action="Admin\Process\ProcessUpdateUser.php" method="POST">

     <div >
           <label >Member ID</label>
           <input type="" name="MemID"
           value="<?php echo "$ID" ?>" readonly>
     </div>

 <div >
       <label >First Name</label>
       <input type="text" name="FirstName"
       value="<?php echo "{$info['fldFstName']}" ?>">
 </div>
 <div >
       <label >Last Name</label>
       <input type="text" name="LastName"
       value="<?php echo "{$info['fldLstName']}" ?>">
 </div>
 <div >
       <label >Address</label>
       <input type="text" name="Address"
       value="<?php echo "{$info['fldAddress']}" ?>">
 </div>
 <div >
       <label >Post Code</label>
       <input type="text" name="Postcode"
       value="<?php echo "{$info['fldPstCd']}" ?>">
 </div>
 <div >
       <label >Phone Number</label>
       <input type="number" name="PhoneNumber"
       value="<?php echo "{$info['fldPhoneNum']}" ?>">
 </div>
 <div >
       <label >User Priviledge</label>
       <input type="text" name="Priviledge"
       value="<?php echo "{$info['fldPriv']}" ?>">
 </div>
 <div >
       <label >Password</label>
       <input type="password" name="Password"
       value="<?php echo "{$info['fldPassWrd']}" ?>">
 </div>
 <div>
   <input type="submit" class="btn btn-success"name="UpdateUser" value="Update User">
 </div>
  </form>

  <?php include_once "Admin\Headers\Footer.php"; ?>
</body>
