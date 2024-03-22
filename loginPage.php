<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Minimal Login Design</title>
</head>

<body>
    
    <div class="logo">
        <img src="logo1.jpg">
        <a href="#">Lisboa+Perto</a>
    </div>

    <div class="container">
        <h1>Login to your account</h1>
        <div class="social-login">
            <form action="index.php" method="post">
                <button class="guest" type="submit" name="guest" value="guest">
                    <i class='bx bxs-user'></i>
                    Enter as guest
                </button>
            </form>
        </div>
        <div class="divider">
            <div class="line"></div>
            <p>Or</p>
            <div class="line"></div>
        </div>

        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <label for="email">Email:</label>
            <div class="customer-input">
                <input type="email" name="email" placeholder="Your Email" autocomplete="off">
                <i class='bx bx-at'></i>
            </div>
            <label for="password">Password:</label>
            <div class="customer-input">
                <input type="password" name="password" placeholder="">
                <i class='bx bx-lock-alt'></i>
            </div>
            <button class="login" type="submit" name="login" value="login">Login</button>
            <div class="links">
                <a href="#">Reset Password</a>
                <a href="#">Don't have an account?</a>
            </div>
        </form>

    </div><br>

</body>

</html>
<?php
    if(isset($_POST["guest"])){
        header("Location: home.php");
    }


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($email)){
            echo "Please enter your email address";
        }
        elseif(empty($password)){
            echo "Please enter your password";
        }
        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO utilizador (email, palavra_passe) VALUES ('$email', '$password')";

            mysqli_query($conn, $sql);
        }
    }

    mysqli_close($conn);
?>
