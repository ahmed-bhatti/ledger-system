<?php
@session_start();
if ($_SESSION['isLoggedIn'] !== 1) {
    header("Location:login.php");
}

$user_id  = $_SESSION['user_id'];
require_once('./assest/loader.php');

// $id = $_GET['Id'];
$my_query = mysqli_query($conn, "select * from ledger_db where user_id=$user_id order by id desc limit 10");

if (isset($_GET['action'])) {

    $id = $_GET['Id'];

    switch ($_GET['action']) {

        case "delete":
            mysqli_query($conn, "delete from ledger_db where Id='$id'");
            header('Location: expenses_data.php');

            break;

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


            <h2>Ledger System</h2>
            <hr />
            <div class="row">
                <div class="col-xl-12">
                    <div id="main-content ">
                        <h2>All Records</h2>
                        <div class="card table-responsive" id="no-more-tables">

                            <table class="table">
                                <thead class="bg-dark text-light">
                                    <th>ID</th>
                                    <th>Credit</th>
                                    <th>Debit</th>
                                    <th>Balance</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php while ($res = mysqli_fetch_assoc($my_query)) { ?>
                                        <tr>
                                            <td data-title="ID"><?php echo $res['Id'] ?></td>
                                            <td data-title="Credit"><?php echo $res['credit'] ?></td>
                                            <td data-title="Debit"><?php echo $res['debit'] ?></td>
                                            <td data-title="Balance"><?php echo $res['balance'] ?></td>
                                            <td data-title="Description"><?php echo $res['description'] ?></td>
                                            <td class="edit" data-title="Action">
                                                <a class="edits" href="edit.php?action=edit&Id=<?php echo $res['Id']; ?>"><i class="fas fa-edit "></i>Edit</a>
                                                <a class="delete" href="expenses_data.php?action=delete&Id=<?php echo $res['Id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>






                            <!-- <table cellpadding="25px" >
        <thead>
        <th>Id</th>
        <th>Credit</th>
        <th>Debit</th>
        <th>Balance</th>
        <th>Description</th>
        <th>Action</th>
        </thead>
        <tbody> 
            <?php while ($res = mysqli_fetch_assoc($my_query)) { ?>
            <tr>
                <td><?php echo $res['Id'] ?></td>
                <td><?php echo $res['credit'] ?></td>
                <td><?php echo $res['debit'] ?></td>
                <td><?php echo $res['balance'] ?></td>
                <td><?php echo $res['description'] ?></td>
                <td class="edit">
                    <a class="edits" href="expenses_data.php?action=edit&Id=<?php echo $res['Id']; ?>"><i class="fas fa-edit "></i>Edit</a>
                    <a class="delete" href="expenses_data.php?action=delete&Id=<?php echo $res['Id']; ?>"><i class="fa-solid fa-trash-can"></i>Delete</a>
                </td>
            </tr>
            <?php } ?>
           
        </tbody>
    </table> 
 -->

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </main>







    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>