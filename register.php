<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Registro</title>
</head>
<body style="background-color: #d3d3d3;">
    <nav class="navbar navbar-expand-xxl border-bottom" style="background-color: #fff;">
        <div class="container-fluid">
            <a href="#" class="navbar-brand mx-5">
                <img src="logo1.jpg" style="height: 50px;">
                Lisboa+Perto
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link" id="navButoes"><i class='bx bx-support'></i></a>
                </li>
                <li class="nav-item me-3 ms-2">
                    <a href="userHome.php" type="button" class="btn btn-lg btn-secondary rounded-4 w-10 fs-6 mt-2">Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Register Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area mb-5">

       <?php 
         
         include("database.php");
         if(isset($_POST['submit'])){
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

            $palavra_passe = filter_input(INPUT_POST, "palavra_passe", FILTER_SANITIZE_SPECIAL_CHARS);
            
            $nif = filter_input(INPUT_POST, "nif", FILTER_SANITIZE_SPECIAL_CHARS);
            $primeiro_nome_ut = filter_input(INPUT_POST, "primeiro_nome_ut", FILTER_SANITIZE_SPECIAL_CHARS);
            $apelido_ut = filter_input(INPUT_POST, "apelido_ut", FILTER_SANITIZE_SPECIAL_CHARS);
            $telemovel = filter_input(INPUT_POST, "telemovel", FILTER_SANITIZE_SPECIAL_CHARS);

            if(!ctype_alnum($palavra_passe)){
                echo "<div class='row'>
                            <p>Palavra-passe não pode conter símbolos especiais.</p>
                        </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn btn-primary'>Go Back</button>";
            }
            elseif (preg_match('/[^a-zA-ZÀ-ÿ\s]/', $primeiro_nome_ut) OR preg_match('/[^a-zA-ZÀ-ÿ\s]/', $apelido_ut)) {
                echo "<div class='row'>
                            <p>Input inválido nos campos dos nomes.</p>
                        </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn btn-primary'>Go Back</button>";
            }else{
                //verifying the unique email

                $verify_query = mysqli_query($conn, "SELECT Email FROM utilizador WHERE Email='$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='row'>
                                <p>This email is used, Try another One Please!</p>
                            </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn btn-primary'>Go Back</button>";
                }
                else {
                    // echo $palavra_passe;
                    $hash = password_hash($palavra_passe, PASSWORD_DEFAULT);

                    mysqli_query($conn, "INSERT INTO utilizador(email,palavra_passe,nif,primeiro_nome_ut,apelido_ut,telemovel) VALUES('$email','$hash','$nif','$primeiro_nome_ut','$apelido_ut','$telemovel')") or die("Error Occured");

                    $emailDB = mysqli_real_escape_string($conn, $_POST['email']);

                    $result = mysqli_query($conn, "SELECT * FROM utilizador WHERE email='$email'") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    header("Location: loginPage.php");
                }
            }

         }else{
         
        ?>
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <!-- <div class="featured-image mb-3">
                    <img src="logo1.jpg" class="img-fluid" style="width: 250px;">
                </div> -->
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Junte-se a outros cidadãos para o fim de tentar fazer Lisboa um melhor lugar.</small>
            </div> 

            <!-------------------- ------ Right Box ---------------------------->
                
            <div class="col-md-6 right-box" >
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Bem-vindo</h2>
                        <p>Estamos felizes por estar de volta.</p>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="primeiro_nome_ut" placeholder="Primeiro Nome" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="apelido_ut" placeholder="Apelido" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="email" class="form-control form-control-lg bg-light fs-6" name="email" placeholder="Email address" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control form-control-lg bg-light fs-6" name="telemovel" placeholder="Nº telemóvel" required min="0" max="999999999" pattern="[0-9]{1,9}">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control form-control-lg bg-light fs-6" name="nif" placeholder="NIF" required min="0" max="999999999" pattern="[0-9]{1,9}">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="palavra_passe" placeholder="Password" required>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" name="submit" value="Register" class="btn btn-lg btn-primary w-100 fs-6" required>Registar</button>
                        </div>
                        <div class="row">
                            <small>Já tem conta? <a href="loginPage.php">Login</a></small>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        <?php } ?>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>