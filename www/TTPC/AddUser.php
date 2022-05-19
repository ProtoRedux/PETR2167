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
include_once "Admin\Config\Include.php";

$conn = new mysqli ($host, $my_user, $my_password, $my_db);

if($conn==false)
{
  die("A connection error has occured");
}

 ?>

<body>

   <div class="container d-flex justify-content-center
         align-items-center"
         style= "min-height: 80vh">
         <form class="" action="Admin\Process\ProcessAddUser.php" method="POST" class= "border shadow p-3 rounded"
                     style="width:450px">
           <h1 class="text-center">add user</h1>

           <div class="mb-3" >
                 <label >First Name</label>
                 <input type="text" name="FirstName">
           </div>
           <div class="mb-3"  >
                 <label >Last Name</label>
                 <input type="text" name="LastName">
           </div>
           <div class="mb-3" >
                 <label >Address</label>
                 <input type="text" name="Address">
           </div>
           <div class="mb-3" >
                 <label >Post Code</label>
                 <input type="text" name="Postcode">
           </div>
           <div class="mb-3" >
                 <label >Phone Number</label>
                 <input type="number" name="PhoneNumber">
           </div>
           <div >
                 <label >Password</label>
                 <input type="password" name="Password">
           </div>
           <div>
             <input type="submit" class="btn btn-primary"name="AddUser" value="Add User">
           </div>
       </form>

  </div>


  <?php include_once "Admin\Headers\Footer.php"; ?>
</body>
