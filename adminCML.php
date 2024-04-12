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
    <title>CML - Ocorrências</title>

</head>
<body>
        <nav class="navbar navbar-expand-xxl border-bottom border-body">
            <div class="container-fluid">
                <a href="#" class="navbar-brand mx-5">
                    <img src="cmlLogo.png" style="height: 50px;">
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a href="#" class="nav-link" id="linksCabecalho">Gerir Ocorrências</a>
                    </li>
                    <li class="nav-item">
                        <a href="estatisticas.php" class="nav-link" id="linksCabecalho">Estatíticas</a>
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


    <div class="container-fluid text-center">
        <div class="row justify-content-center align-items-end mb-4" style="height: 200px;">
            <div class="col-6">
                <div>
                    <h1>Pesquise aqui as ocorrências</h1>
                </div>
            </div>
        </div>
    </div>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="container-xl text-center">
            <div class="input-group mb-3">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Ordenar por</button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><input class="dropdown-item" type="submit" name="filTodas" value="Todas"></li>
                    <li><input class="dropdown-item" type="submit" name="filLocalização" value="Localização"></li>
                    <li><input class="dropdown-item" type="submit" name="filCategoria" value="Categoria"></li>
                    <li><input class="dropdown-item" type="submit" name="filEstado" value="Estado"></li>
                </ul>
                <input type="text" name="searchInput" placeholder="Pesquisa ocorrências por localização/categoria/estado" class="form-control" id="pesquisaPorOcorrencias" aria-label="Text input with dropdown button">
                <button type="submit" class="btn btn-outline-secondary" name="searchBtn" id="button-addon2"><i class='bx bx-search'></i></button>
            </div>
        </div>
    </form>



    
    
    <div class="container-fluid mt-5">
    

        <?php
            
            $phpToHtml = "";
            if($_SERVER["REQUEST_METHOD"] != "POST"){
                # Visualizar todas as ocorrências
                include "todasOcorrenciasCML.php"; 
            }                           
            else {
                # CATEGORIAS
                if (isset($_POST["filCategoria"])){
                    include "verCategoriasCML.php";        
                }
                # ESTADO
                elseif (isset($_POST["filEstado"])){
                    include "verEstadoCML.php"; 
                }
                # LOCALIZAÇÃO
                elseif (isset($_POST["filLocalização"])){
                    include "verLocalizacaoCML.php";      
                }    
                # VOLTAR A VER COMO DEFAULT
                elseif (isset($_POST["filTodas"])){
                    include "todasOcorrenciasCML.php";      
                }    
            }
            
        ?>

        <?php

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                include "filtraInput.php";
            }
        ?>
    </div> 

    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>