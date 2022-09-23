


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3" />
    <title>Ledger - Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assest/css/dashboard.css" />
  </head>

  <body>
  
    <div class="page-wrapper chiller-theme toggled">
      <a id="show-sidebar" class="btn btn-sm btn-primary" href="#">
        <i class="fas fa-bars"></i>
      </a>
      <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
          <div class="sidebar-brand">
          
            <a href="#">Ledger System</a>
            <div id="close-sidebar">
              <i class="fas fa-times"></i>
            </div>
          </div>
          <div class="sidebar-header">
            <div class="user-pic">
              <img class="img-responsive img-rounded" src="./assest/images/197112879_1970789983075531_1610897399233830467_n.jpg" alt="User picture" />
            </div>
            <div class="user-info">
                <strong class="user-name"><?php
                @session_start();
                    $user_id  = $_SESSION['user_id'];

                    $total_sum = mysqli_query($conn, "select firstname from register  where Id={$user_id} order by Id desc limit 1");
                      
                    // echo $total_sum;
                    if (mysqli_num_rows($total_sum) >= 0) {
                      $row = mysqli_fetch_assoc($total_sum);
                      foreach($row as $name)
                      echo $name;
                    }


                //     ?></strong>
                <span class="user-role">Normal user</span>
            </div>
          </div>
          <!-- sidebar-search  -->
          <div class="sidebar-menu">
            <ul>
              <li class="header-menu">
                <span>Extra</span>
              </li>
              <li>
                <a href="./index.php">
                  <i class="fa fa-home"></i>
                  <span>Home</span>
                </a>
              </li>
              <li>
                <a href="./expenses_data.php">
                  <i class="fa fa-user"></i>
                  <span>Expenses Data</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-info"></i>
                  <span>Contact</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
          <a href="logout.php">
            <i class="fa fa-power-off"></i>
            <span> Logout</span>
          </a>
        </div>
      </nav>



      <script src="./assest/js/index.js"></script>
    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>