<?php


@session_start();

if ($_SESSION['isLoggedIn'] !== 1) {
  header("Location:login.php");
}

require_once('./assest/loader.php');
if (isset($_POST['credit'])) {

  $user_id  = $_SESSION['user_id'];
  $credit       = $_POST['credit'];
  $debit        = $_POST['debit'];
  $balance      = $_POST['credit'] - $_POST['debit'];
  $description  = $_POST['description'];




  $stmt = mysqli_query($conn, "insert into ledger_db(user_id,credit, debit, balance,description)  values('$user_id','$credit','$debit','$balance','$description')");
  if ($stmt){
    $notice  = "Added successfully";
    header('Location: index.php');
  }
  else{
    $notice  = "Unable to added , other error" . mysqli_error($conn);
  }
}








?>




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

  <?php include_once("./sidebar.php"); ?>
  <!-- sidebar -->
  <main class="page-content">
    <div class="container-fluid">
      <h2>Ledger System</h2>
      <hr />
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <div class="card l-bg-cherry">
            <div class="card-statistic-3 p-4">
              <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
              <div class="mb-4">
                <h5 class="card-title mb-0">Credit</h5>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                  <h2 class="d-flex align-items-center mb-0">
                  <?php
                    $user_id  = $_SESSION['user_id'];

                    $total_sum = mysqli_query($conn, "select credit from ledger_db  where user_id={$user_id} order by Id desc limit 1");

                    if (mysqli_num_rows($total_sum) >= 0) {
                      $row = mysqli_fetch_assoc($total_sum);
                      if($row>0){
                        foreach ($row as $ru) {
                          echo "Rs: $ru ";
                        }
                      }
                        else{
                          echo "Rs:0";
                        }
                      
                     
                    }
                    
                  
                    ?>
                  </h2>
                </div>
                <div class="col-4 text-right">
                  <span>0 <i class="fa fa-arrow-up"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6">
          <div class="card l-bg-orange-dark">
            <div class="card-statistic-3 p-4">
              <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
              <div class="mb-4">
                <h5 class="card-title mb-0">Debit</h5>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                  <h2 class="d-flex align-items-center mb-0">
                  <?php
                    $user_id  = $_SESSION['user_id'];

                    $total_sum = mysqli_query($conn, "select debit from ledger_db  where user_id={$user_id} order by Id desc limit 1");

                    if (mysqli_num_rows($total_sum) >= 0) {
                      $row = mysqli_fetch_assoc($total_sum);
                      if($row>0){
                        foreach ($row as $ru) {
                          echo "Rs: $ru ";
                        }
                      }
                      else{
                          echo "Rs:0";
                        }
                      
                     
                    }
                    
                  
                    ?>
                  </h2>
                </div>
                <div class="col-4 text-right">
                  <span>0 <i class="fa fa-arrow-up"></i></span>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12 col-lg-6">
          <div class="card l-bg-green-dark">
            <div class="card-statistic-3 p-4">
              <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
              <div class="mb-4">
                <h5 class="card-title mb-0">Total</h5>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                  <h2 class="d-flex align-items-center mb-0">
                    <?php
                    $user_id  = $_SESSION['user_id'];

                    $total_sum = mysqli_query($conn, "select sum(balance) from ledger_db where user_id={$user_id}");

                    if (mysqli_num_rows($total_sum) >= 0) {
                      $row = mysqli_fetch_assoc($total_sum);
                      if($row>0){
                        foreach ($row as $ru) {
                          echo "Rs: $ru ";
                        }
                      }
                        else{
                          echo "Rs:0";
                        }
                      
                     
                    }

                    ?></h2>
                </div>
                <div class="col-4 text-right">
                  <span>0 <i class="fa fa-arrow-up"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <h4 class="page-header">Details & Information</h4>
          <!-- <?php echo $notice;  ?> -->
          <form action="?action=add" method="post" enctype="multipart/form-data">
            <div class="form-group float-label-control">
              <label for="">Credit</label>
              <input type="number" class="form-control" name="credit" placeholder="Credit" style="width: 100%;" />
            </div>
            <div class="form-group float-label-control">
              <label for="">Debit</label>
              <input type="number" class="form-control" name="debit" placeholder="Debit" style="width: 100%;" />
            </div>
            <div class="form-group float-label-control">
              <label for="">Description</label>
              <textarea class="form-control" placeholder="description" name="description" rows="6" style="width: 100%;"></textarea>
            </div>
            <div class="form-group float-label-control">
              <button class="btn btn-primary" name="add">Add Transaction</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <footer class="text-center">
      <div class="mb-2">
        <small> © 2020 made with - Ahmad Ali</small>
      </div>
    </footer>
    </div>
  </main>
  <!-- page-content" -->
  </div>

  <script src="./assest/js/index.js"></script>
  <!-- page-wrapper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>