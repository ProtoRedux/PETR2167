<?php
include_once 'Admin\Headers\GenericHeader.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Taw & Torridge Photography club</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>


<div class="container d-flex justify-content-center
        align-items-center"
        style= "min-height: 80vh">
          <form action="Admin/Process/ProcessLogin.php" method="post" class= "border shadow p-3 rounded"
                  style="width:450px">
                  <h1 class="text-center"> Please Login
                        <h4>
                          <?php
                              error_reporting(0);
                              session_start();
                              session_destroy();
                          echo $_SESSION['loginMessage'];
                          ?>
                      </h4>

                  </h1>
            <div class="mb-3">
              <label for="UserID"
                      class="form-label">User ID Number</label>
              <input type="text"
                      Name="UserID"
                      class="form-control"
                      id="UserID">
                              </div>

                      <div class="mb-3">
                        <label for="password"
                                class="form-label">Password</label>
                        <input type="password"
                                Name="password"
                                class="form-control"
                                id="password">
                                          </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
   <?php include_once '\Admin\Headers\Footer.php'; ?>

</body>
