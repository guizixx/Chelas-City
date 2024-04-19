<?php
    session_start();
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css">
    <title>Lisboa+Perto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-color: #d3d3d3;">
    <nav class="navbar navbar-expand-xxl border-bottom" style="background-color: #fff;">
        <div class="container-fluid">
            <a href="#" class="navbar-brand mx-5">
                <img src="logo1.jpg" style="height: 50px;">
                Lisboa+Perto
            </a>
        </div>
    </nav>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <?php
            if(isset($_POST["submit"])){
                // $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                // $palavra_passe = filter_input(INPUT_POST, "palavra_passe", FILTER_SANITIZE_SPECIAL_CHARS);

                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                // echo $email . "<br>";
                $password = mysqli_real_escape_string($conn, $_POST["palavra_passe"]);
                // echo $password;
                // if(password_verify($password, $row['palavra_passe'])){
                //     echo "Verificou o hash";
                // }

                if(!ctype_alnum($password)){
                    echo "<div class='row'>
                                <p>Palavra-passe não pode conter símbolos especiais.</p>
                            </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn btn-primary'>Go Back</button>";
                }else{
                    $result = mysqli_query($conn,"SELECT * FROM utilizador WHERE email='$email'") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);
                    // echo $row['primeiro_nome_ut'];
                    // echo $row['palavra_passe'];

                    if(is_array($row) && !empty($row) && password_verify($password, $row['palavra_passe'])){
                        $_SESSION['valid'] = $row['email'];
                        $_SESSION['firstname'] = $row['primeiro_nome_ut'];
                        $_SESSION['lastname'] = $row['apelido_ut'];
                        $_SESSION['nif'] = $row['nif'];
                        $_SESSION['phonenumber'] = $row['telemovel'];
                        $_SESSION['id'] = $row['id'];
                    }else{
                        
                        echo "<div class='row'>
                                    <p>Wrong Email or Password!</p>
                                </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn btn-primary'>Go Back</button>";
            
                    }
                    if(isset($_SESSION['valid'])){
                        header("Location: userRegistradoHome.php");
                    }
                }
        
            }else{

        ?>  
    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <!-- <div class="featured-image mb-3">
            <img src="logo1.jpg" class="img-fluid" style="width: 250px;">
           </div> -->
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Junte-se a outros cidadãos para o fim de tentar fazer Lisboa um melhor lugar.</small>
       </div> 

    <!-------------------------- Right Box ---------------------------->
        
       <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Bem-vindo</h2>
                     <p>Estamos felizes por estar de volta.</p>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                </div>
                <div class="input-group mb-1">
                    <input type="password" name="palavra_passe" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
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
                    <button type="submit" name="submit" value="Login" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                </div>
                <div class="input-group mb-3">
                    <a href="userHome.php" class="btn btn-lg btn-light w-100 fs-6" id="registro">Entrar sem Login</a>
                </div>
                <div class="row">
                    <small>Ainda não tem conta? <a href="register.php">Sign Up</a></small>
                </div>
          </div>
        </form> 

      </div>
    </div>
    <?php } ?>

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
