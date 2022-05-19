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
    <h1 class="display-1">Welcome to your personal dashboard <?php echo $_SESSION['FstName'] , " ", $_SESSION['LstName'];?></h1>
  </div>
</div>

<div class="row">
  <div  class= "container d-flex justify-content-center align-items-center "
						style="min-height: 10vh">
      <h1> Some interesting things for you to look out for:</h1>
  </div>
</div>

<div class="row">
  <div class="container d-flex justify-content-center
          align-items-top"
          style= "min-height: 12vh">
            <h2> upcoming shoots </h2>
  </div>

</div>

<div class="container d-flex justify-content-center"

       </table>
       <table class="table table-striped" border="3px">
         <thead>
           <tr>
             <th scope="col">Location</th>
             <th scope="col">Shoot Date</th>
           </tr>
         </thead>

		      <?php
                $conn = new mysqli ($host, $my_user, $my_password, $my_db);
				//select only data from table where the date of the shoot hasn't already passed
                $sql="SELECT * FROM `tblshoots` WHERE `fldDate` >= CURRENT_DATE";

                $result = $conn -> query($sql);
					//fetch only matching results from the sql query
                while ($row=$result -> fetch_assoc())
                {
        ?>
		<!-- table body that will update depending on the number of unmmissed shoots. -->
         <tbody>
           <tr>
             <td> <?php echo "{$row['fldLocation']}" ?> </td>
             <td> <?php echo "{$row['fldDate']} " ?> </td>
			 <td> "Don't Miss Out!"</td>
           </tr>
         </tbody>
            <?php } ?>
       </table>
</div>

<?php include_once "Admin\Headers\Footer.php"; ?>
</Body>
