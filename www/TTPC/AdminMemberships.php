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
$sql = "SELECT * FROM `tblmembers`";
$result = $conn -> query($sql);
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
     <h1>Current Members List</h1>


   </div>
     <div class="container d-flex justify-content-center">
          <h2>
             <?php
                  error_reporting(0);
                 if($_SESSION['message'])
                 {
                   echo $_SESSION['message'];
                 }
                 unset($_SESSION['message']);

                 if($_SESSION['messageupdate'])
                 {
                   echo $_SESSION['messageupdate'];
                 }
                 unset($_SESSION['messageupdate']);

              ?>
          </h2>
   </div>


<div class="container d-flex justify-content-center">

       </table>
       <table class="table" border="3px">
         <thead>
           <tr>
             <th scope="col">Member ID</th>
             <th scope="col">First Name</th>
             <th scope="col">Last Name</th>
             <th scope="col">Address</th>
             <th scope="col">Postcode</th>
             <th scope="col">Phone Number</th>
             <th scope="col">Site Priviledge</th>
             <th scope="col">Password</th>
             <th scope="col">Delete User</th>
             <th scope="col">Update User</th>
           </tr>
         </thead>
         <?php
         while ($info = $result->fetch_assoc())
         {
          ?>
         <tbody>
           <tr>
             <td> <?php echo "{$info['fldMemID']}" ?> </td>
             <td> <?php echo "{$info['fldFstName']}" ?> </td>
             <td> <?php echo "{$info['fldLstName']}" ?> </td>
             <td> <?php echo "{$info['fldAddress']}" ?> </td>
             <td> <?php echo "{$info['fldPstCd']}" ?> </td>
             <td> <?php echo "{$info['fldPhoneNum']}" ?> </td>
             <td> <?php echo "{$info['fldPriv']}" ?> </td>
             <td> <?php echo "{$info['fldPassWrd']}" ?> </td>
             <td> <?php echo "<a onClick= \"javascript: return confirm('Are you sure?');\" class= 'btn btn-danger' href='Admin\Process\ProcessDeleteUser.php?User_ID={$info['fldMemID']}'> Delete </a>" ?> </td>
             <td> <?php echo "<a class= 'btn btn-primary'href='UpdateUser.php?User_ID={$info['fldMemID']}'> Update </a>" ?> </td>
           </tr>

         </tbody>
            <?php } ?>
       </table>
</div>

<div class="container d-flex justify-content-center">
  <table class= "table">
    <thead>
      <tr>
          <th scope="col">
            <div class="d-grid gap-2 col-6 mx-auto">
              <a class= 'btn btn-success btn-lg' href="AddUser.php">Add new user</a></th>
            </div>

      </tr>
    </thead>

  </table>
  </div>





</div>


   <?php include_once '\Admin\Headers\Footer.php'; ?>

 </body>
