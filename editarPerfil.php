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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Editar Perfil</title>
</head>
<body style="background-color: #d3d3d3;">
    <nav class="navbar navbar-expand-xxl border-bottom" style="background-color: #fff;">
        <div class="container-fluid">
            <a href="#" class="navbar-brand mx-5">
                <img src="logo1.jpg" style="height: 50px;">
                Lisboa+Perto
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <a href="userRegistradoHome.php" class="nav-link" id="linksCabecalho" style="font-weight: 700;">Home</a>
                </li>
            </ul>
        </div>
    </nav>
    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Register Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area mb-5">

       <?php 
               if(isset($_POST['submit'])){
                $firstname = $_POST['primeiro_nome_ut'];
                $lastname = $_POST['apelido_ut'];
                $phonenumber = $_POST['telemovel'];
                $nif = $_POST['nif'];

                $id = $_SESSION['id'];

                if (preg_match('/[^a-zA-ZÀ-ÿ\s]/', $firstname) OR preg_match('/[^a-zA-ZÀ-ÿ\s]/', $lastname)) {
                    echo "<div class='row'>
                                <p>Input inválido nos campos dos nomes.</p>
                            </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn btn-primary'>Go Back</button>";
                }else{
                    $edit_query = mysqli_query($conn,"UPDATE utilizador SET primeiro_nome_ut='$firstname', apelido_ut='$lastname', telemovel='$phonenumber', nif='$nif' WHERE id='$id' ") or die("error occurred");

                    if($edit_query){
                        echo "<div class='row'>
                                <p>Profile Updated!</p>
                            </div> <br>";
                        echo "<a href='userRegistradoHome.php'><button class='btn btn-primary'>Go Home</button>";
                    }
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($conn,"SELECT*FROM utilizador WHERE id='$id' ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Fname = $result['primeiro_nome_ut'];
                    $res_Lname = $result['apelido_ut'];
                    $res_Nif = $result['nif'];
                    $res_PhoneNumber = $result['telemovel'];
                }

            ?>
            <div class="col-md-6 rounded-4 d-flex justify-content-center text-center align-items-center flex-column left-box" style="background: #103cbe;">
                <!-- <div class="featured-image mb-3">
                    <img src="logo1.jpg" class="img-fluid" style="width: 250px;">
                </div> -->
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Altere as suas informações</p>
            </div> 

            <!-------------------- ------ Right Box ---------------------------->
                
            <div class="col-md-6 right-box" >
                <div class="row align-items-center mb-4">
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="primeiro_nome_ut" value="<?php echo $res_Fname; ?>" autocomplete="off" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="apelido_ut" value="<?php echo $res_Lname; ?>" autocomplete="off" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control form-control-lg bg-light fs-6" name="telemovel" value="<?php echo $res_PhoneNumber; ?>" autocomplete="off" required min="0" max="999999999" pattern="[0-9]{1,9}">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control form-control-lg bg-light fs-6" name="nif" value="<?php echo $res_Nif; ?>" autocomplete="off" required min="0" max="999999999" pattern="[0-9]{1,9}">
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" name="submit" value="Update" class="btn btn-lg btn-primary w-100 fs-6" required>Update</button>
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