<?php
function drawNav()
{
    if (isset($_SESSION['userID'])) {

        if ($_SESSION['fldPriv'] == "User") {
            echo
            '
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>

            </div>
          <script src="Admin/Config/js/bootstrap.min.js"> </script>';
            }

        if ($_SESSION['fldPriv'] == "Administrator") {
            echo'
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>

            </div>
          <script src="Admin/Config/js/bootstrap.min.js"> </script>';
      }
    }
}

?>
