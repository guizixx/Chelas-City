<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageCMLstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>CML - Estatísticas</title>
</head>
<body style="background-color: #f0f0f0;">
    <nav class="navbar navbar-expand-xxl border-bottom border-body" style="background-color: #fff;">
        <div class="container-fluid">
            <a href="#" class="navbar-brand mx-5">
                <img src="cmlLogo.png" style="height: 50px;">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <a href="#" class="nav-link" id="linksCabecalho">Gerir Ocorrências</a>
                </li>
                <li class="nav-item me-3">
                    <a href="#" class="nav-link" id="ativo">Estatísticas</a>
                </li>
                <li class="nav-item">
                    <a href="adminCML.php" class="nav-link" id="linksCabecalho">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link" id="navButoes"><i class='bx bx-support'></i></a>
                </li>
                <li class="nav-item dropdown me-3 ms-2">
                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="navButoes"><i class='bx bx-user'></i></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="#" class="dropdown-item">My Account</a></li>
                        <li><a href="#" class="dropdown-item">Change Account</a></li>
                        <li><a href="#" class="dropdown-item">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid text-center" >
        <div class="row justify-content-center align-items-center mb-4" style="height: 200px;">
            <div class="col-6">
                <div>
                    <h1 style="font-weight: bold;">Estatísticas</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container px-4 text-center text-white">
        <div class="row gx-5 mb-2">
            <div class="col text-black">
                <div class="p-3 rounded" style="background: #d3d3d3;" id="textStats">Número de ocorrências</div>
            </div>
            <div class="col text-black">
                <div class="p-3 rounded" style="background: #d3d3d3;" id="textStats">Número de ocorrências por categoria</div>
            </div>
            <div class="col text-black">
                <div class="p-3 rounded" style="background: #d3d3d3;" id="textStats">Percentagem de ocorrências resolvidas</div>
            </div>
        </div>
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 rounded" style="background: #08702b;" id="textStats">
                    <?php
                        if($_SERVER["REQUEST_METHOD"] != "POST"){
                            include "countNOccorencias.php";
                        }   
                    ?>
                </div>
            </div>
            <div class="col">
                <div class="p-3 rounded" style="background: #08702b;" id="textStats">
                    <?php
                        if($_SERVER["REQUEST_METHOD"] != "POST"){
                            include "nOcorrenciasPCategoria.php";
                        }   
                    ?>
                </div>
            </div>
            <div class="col">
                <div class="p-3 rounded" style="background: #08702b;" id="textStats">
                    <?php
                        if($_SERVER["REQUEST_METHOD"] != "POST"){
                            include "percentagemOcorrencias.php";
                        }   
                    ?>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="container-fluid text-center rounded text-white">
        <div class="row-sm border gx-5">
            
            <div class="col-2 p-3 border rounded" style="background: #08702b;">
                <div >Número de ocorrências</div>
            </div>
            <div class="col-2 border rounded" style="background: #08702b;">
                <div style = "font-weight: 600; font-size: 20px;">Número de ocorrências por categoria</div>
            </div>
            <div class="col-2 border rounded" style="background: #08702b;">
                <div style = "font-weight: 600; font-size: 20px;">Percentagem de ocorrências resolvidas na última semana</div>
            </div>

            
            <div class="col-2 border rounded" style="background: #08702b;">
                <?php
                    if($_SERVER["REQUEST_METHOD"] != "POST"){
                        include "countNOccorencias.php";
                    }   
                ?>
            </div>
            <div class="col-2 border rounded" style="background: #08702b;">
                <div class="d-flex align-items-center justify-content-center">
                    <?php
                        if($_SERVER["REQUEST_METHOD"] != "POST"){
                            include "nOcorrenciasPCategoria.php";
                        }   
                    ?>
                </div>
            </div>
            <div class="col-2 border rounded" style="background: #08702b;">
                <?php
                    if($_SERVER["REQUEST_METHOD"] != "POST"){
                        include "percentagemOcorrencias.php";
                    }   
                ?>
            </div>
        </div> -->
        
        
        
        
        
        
        
        
        <!-- <div class="row justify-content-around">
            <div class="col-4">
                <?php
                    if($_SERVER["REQUEST_METHOD"] != "POST"){
                        include "countNOccorencias.php";
                    }   
                ?>
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center justify-content-center">
                    <?php
                        if($_SERVER["REQUEST_METHOD"] != "POST"){
                            include "nOcorrenciasPCategoria.php";
                        }   
                    ?>
                </div>
            </div>
            <div class="col-4">
                <?php
                    if($_SERVER["REQUEST_METHOD"] != "POST"){
                        include "percentagemOcorrencias.php";
                    }   
                ?>
            </div>
        </div> -->
    </div>
    
    
    
    <!-- <div class="container-md mt-5 text-white rounded" style="background: #08702b; width:50%;">
        <div class="row">
            <div class="col-4">
                <h2>Número de ocorrências</h2>
                <?php
                    if($_SERVER["REQUEST_METHOD"] != "POST"){
                        include "countNOccorencias.php";
                    }   
                ?>
            </div>
            <div class="col-4">
                <h2>Número de ocorrências por categoria</h2>
                <?php
                    if($_SERVER["REQUEST_METHOD"] != "POST"){
                        include "nOcorrenciasPCategoria.php";
                    }   
                ?>
            </div>
            <div class="col-4">
                <h2>Percentagem de ocorrências resolvidas na última semana</h2>
                <?php
                    if($_SERVER["REQUEST_METHOD"] != "POST"){
                        include "percentagemOcorrencias.php";
                    }   
                ?>
            </div>
        </div>
        
    </div> -->

    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>