 <?php

    @session_start();
 

    $conn = new mysqli('localhost', 'root', '', 'ledger system');

    if (isset($_POST['email'])) {


        $email    = $_POST['email'];
        $password = md5( $_POST['password']);
        $query  = mysqli_query($conn, "select * from register where Email='$email' and password = '$password'");
        $res = mysqli_fetch_assoc($query);
        $found_accounts = mysqli_num_rows($query);
        if ($found_accounts > 0) {
            $_SESSION['isLoggedIn'] = 1;
            $_SESSION['user_id']    = $res['Id'];
            header("Location:index.php");
        }
    }


    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Page</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <link rel="stylesheet" href="./assest/css/login.css">
 </head>

 <body>

     <div class="container">
         <div class="card">
             <div class="card-body">
                 <div class="circle"></div>
                 <header class="myhead text-center">
                     <i class="fas fa-user "></i>
                     <p>Login</p>
                 </header>
                 <form action="" class="mainform text-center" method="post" enctype="multipart/form-data">
                     <div class="form-group my-0">
                         <label for="" class="my-0">
                             <i class="fas fa-user font"></i>
                             <input type="email" class="myinput" placeholder="E-Mail" name="email">
                         </label>

                     </div>
                     <div class="form-group my-0">
                         <label for="" class="my-0">
                             <i class="fas fa-lock font"></i>
                             <input type="password" class="myinput" placeholder="Password" name="password">
                         </label>

                     </div>
                     <label for="" class="check-1">
                         <input type="checkbox" checked>
                         Remember me
                     </label>
                     <div><span class="check-1" style="color: blue; padding-bottom:15px ; margin-left:140px"> Forget Password</span></div>

                     <div class="form-group ">
                         <label for="" class="my-0">
                             <input type="submit" class="form-control button" value="LOGIN">
                         </label>

                     </div>
                     <div><span class="check-1 mt-4" style="color: blue;  color:#AF10F0; font-weight:bold; font-size:15px"><a href="registers.php" style="text-decoration: none;">Create an Account ?</a> </span></div>


                 </form>
             </div>
         </div>
     </div>
















     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



 </body>

 </html>