<?php 

@session_start();

if ($_SESSION['isLoggedIn'] !== 1) {
    header("Location:login.php");
  }
require_once('./assest/loader.php');
$person_id = $_GET['Id'];

$sql = mysqli_query($conn,"select * from ledger_db where id = {$person_id}");

if(mysqli_num_rows($sql)>0){

}

if(isset($_POST['add'])){
    
    $e_credit = $_POST['credit'];
    $e_debit = $_POST['debit'];
    $e_balance = $_POST['credit'] -  $_POST['debit'];
    $e_description = $_POST['description'];
    
    $query="update ledger_db set credit='$e_credit' , debit='$e_debit'  , description='$e_description', balance='$e_balance' where id='$person_id'";
    $update = mysqli_query($conn, $query);
    
    if($update){
        header("Location:expenses_data.php");
    }
    else {
        echo "Data not storded";
    }
}



?>





<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
  <title>Expenses Data</title>
  <link rel="stylesheet" href="./assest/css/expenses.css">
 
</head>

<body>

<?php include_once('./sidebar.php'); ?>
<main class="page-content">

<div class="container-fluid">
<div class="row">
        <div class="col-sm-8">
          <h4 class="page-header">Edit Records</h4>

          <?php while( $row = mysqli_fetch_assoc($sql)) { ?>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group float-label-control">
              <label for="">Credit</label>
              <input type="number" class="form-control" name="credit" placeholder="Credit" style="width: 100%;" value="<?php echo $row['credit'] ?>" />
            </div>
            <div class="form-group float-label-control">
              <label for="">Debit</label>
              <input type="number" class="form-control" name="debit" placeholder="Debit" style="width: 100%;" value="<?php echo $row['debit'] ?>" />
            </div>
            <div class="form-group float-label-control">
              <label for="">Description</label>
              <textarea class="form-control" placeholder="<?php echo $row['description'] ?>" name="description" rows="6" style="width: 100%;" ></textarea>
            </div>
            <div class="form-group float-label-control">
            <button class="btn btn-primary" name="add">Update Records</button>
            <!-- <a href="update.php" name="update">update</a> -->
            </div>
          </form>
          <?php } ?>
        </div>
      </div>
          
 

     
</div>
</main>



  
        


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>