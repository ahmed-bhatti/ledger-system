<?php

@session_start();
require_once("./assest/loader.php");
if(isset($_POST['email'])){

$firstName       = $_POST['firstname'];
$lastName        = $_POST['lastname'];
$email           = $_POST['email'];
$number          = $_POST['phonenumber'];
$password        = $_POST['password'];
$confirmPassword =md5($_POST['confirmpassword']);



   $encp_password = md5($password,false);
    $stmt = mysqli_query($conn, "insert into register(firstname,lastname,Email,number,password,confirmpassword)values('$firstName','$lastName','$email','$number','$encp_password','$confirmPassword')");
    if ($stmt) {
        $notice  = "User register successfully";
        header("Location:login.php");

    } else {
        $notice  = "Unable to register , other error" . mysqli_error($conn);
    }
}









?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assest/css/register.css">
    <title>Document</title>
</head>

<body>

    <div class="container ">
        <div class="row center ">
            <div class="col-md-6 offset-md-3 borders">
                <div class="signup-form">
                    <div class="form mt-5 p-4 bg-light-shadow ">
                        <h3 class="mb-4 text-white"> Create New Account</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <input type="text" name="lastname" class="form-control edit" placeholder="Enter Last Name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <div class=" mb-3 col-md-6">
                                    <input type="number" name="phonenumber" class="form-control" placeholder=" Your phone number">
                                </div>
                                <div class=" mb-3 col-md-12">
                                    <input type="password" name="password" class="form-control" placeholder=" Password">
                                </div>
                                <div class="mb-3 col-md-12">
                                    <input type="password" name="confirmpassword" class="form-control" placeholder=" Confirm password">
                                </div>
                                <div class="mb-3 col-md-12 center-1 text-center">
                                    <input type="submit" name="button " class="but my-3" value="Submit">

                                </div>
                            </div>
                        </form>


                        <p class="text-center mt-3 text-white"> If you have a account please <a href="login.php">Login Now</a></p>
                        <!-- <?php echo $notice ?> -->
                    </div>
                </div>
            </div>
        </div>
    </div>



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>