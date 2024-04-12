<?php
    session_start();
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Sobre o site</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="background-color: #d3d3d3;">
    <nav class="navbar navbar-expand-xxl border-bottom" style="background-color: #fff;">
        <div class="container-fluid">
            <a href="#" class="navbar-brand mx-5">
                <img src="logo1.jpg" style="height: 50px;">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <a href="#" class="nav-link" id="linksCabecalho">Ajuda ao Cliente</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="ativo">Sobre</a>
                </li>
                <li class="nav-item ms-3">
                    <a href="userRegistradoHome.php" class="nav-link" id="linksCabecalho">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link" id="navButoes"><i class='bx bx-support'></i></a>
                </li>
                <li class="nav-item dropdown me-3 ms-2">
                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="navButoes"><i class='bx bx-user'></i></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php 
                
                        $id = $_SESSION['id'];
                        $sqlBanana = "SELECT * FROM utilizador WHERE id='$id'";
                        $query = mysqli_query($conn, $sqlBanana);
                        // echo "ola banana";
                        while($result = mysqli_fetch_assoc($query)){
                            // echo "segunda banana";
                            $res_Fname = $result['primeiro_nome_ut'];
                            // echo $res_Fname;
                            $res_Lname = $result['apelido_ut'];
                            $res_Email = $result['email'];
                            $res_Nif = $result['nif'];
                            $res_id = $result['id'];
                            // echo $res_id;
                        }
                        echo "<li><a href='editarPerfil.php?Id=$res_id' class='dropdown-item'>Change Profile</a></li>";
                        ?>
                        <!-- <li><a href="#" class="dropdown-item">Change Profile</a></li> -->
                        <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card" style="width: 42rem;">
                <div class="card-body">
                    <h5 class="card-title" style="color: #0d6efd; font-weight: 700; font-size: 25px;">Sobre o nosso site</h5>
                    <div class="mt-3">
                        <h6 class="card-subtitle mb-2 text-body-secondary" style="font-size: 20px;">Criadores</h6>
                        <p class="card-text" style="text-align: justify;">Este site foi criado pelos alunos da Licenciatura de Tecnologias de Informação da FCUL, Guilherme Pinto, Afonso Carvalho e Kaisheng Li.</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="card-subtitle mb-2 text-body-secondary" style="font-size: 20px;">Páginas</h6>
                        <p class="card-text" style="text-align: justify;">O site neste momento tem uma página principal funcional, a página Home onde o utilizador pode ver todas as ocorrências, estas que podem ser filtradas pela localização/categoria e ordenadas por ordem alfabética pelos mesmos critérios.</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="card-subtitle mb-2 text-body-secondary" style="font-size: 20px;">Atualizações</h6>
                        <p class="card-text" style="text-align: justify;">Ao longo do aperfeiçoamento do site, serão aqui noticiadas as novidades em relação à versão anterior.<br>Fiquem atentos!!!</p>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    

    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>