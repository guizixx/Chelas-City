<?php
    // include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-color: #d3d3d3;">
    <nav class="navbar navbar-expand-xxl border-bottom" style="background-color: #fff;">
        <div class="container-fluid">
            <a href="#" class="navbar-brand mx-5">
                <img src="cmlLogo.png" style="height: 50px;">
                CML Admin Login
            </a>
        </div>
    </nav>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex bg-success justify-content-center align-items-center flex-column left-box">
           <!-- <div class="featured-image mb-3">
            <img src="logo1.jpg" class="img-fluid" style="width: 250px;">
           </div> -->
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Bem-vindo</h2>
                     <p>Estamos felizes por estar de volta.</p>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
                    <div class="forgot">
                        <small><a href="#">Forgot Password?</a></small>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-success w-100 fs-6">Login</button>
                </div>
                <div class="row">
                    <small>Ainda não tem conta? <a href="#">Sign Up</a></small>
                </div>
          </div>
       </div> 

      </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
<?php
    // if(isset($_POST["guest"])){
    //     header("Location: home.php");
    // }


    // if($_SERVER["REQUEST_METHOD"] == "POST"){

    //     $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    //     $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    //     if(empty($email)){
    //         echo "Please enter your email address";
    //     }
    //     elseif(empty($password)){
    //         echo "Please enter your password";
    //     }
    //     else{
    //         $hash = password_hash($password, PASSWORD_DEFAULT);
    //         $sql = "INSERT INTO utilizador (email, palavra_passe) VALUES ('$email', '$password')";

    //         mysqli_query($conn, $sql);
    //     }
    // }

    // mysqli_close($conn);
?>