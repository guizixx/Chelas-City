<?php    
    session_start();
    include("database.php");
    if(!isset($_SESSION['valid'])){
        header("Location: register.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Lisboa+Perto</title>
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
                <li class="nav-item me-3">
                    <a href="sobreUserRegistrado.php" class="nav-link" id="linksCabecalho">Sobre</a>
                </li>
                <li class="nav-item">
                    <a href="createOcorrencias.php" class="nav-link" id="linksCabecalho">Registar ocorrências</a>
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
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Ordenar por</button>
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

    <div id="noticias_listagem" class="container-fluid mt-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php

                $phpToHtml = "";
                if($_SERVER["REQUEST_METHOD"] != "POST"){
                    # Visualizar todas as ocorrências
                    include "todasOcorrencias.php"; 
                }                           
                else {
                    # ESTADO
                    if (isset($_POST["filEstado"])){
                        include "verEstado.php";        
                    }
                    # CATEGORIAS
                    elseif (isset($_POST["filCategoria"])){
                        include "verCategorias.php";        
                    }
                    # LOCALIZAÇÃO
                    elseif (isset($_POST["filLocalização"])){
                        include "verLocalizacao.php";      
                    }                        
                    elseif (isset($_POST["filTodas"])){
                        include "todasOcorrencias.php";      
                    }                      
                }
            ?>

            <?php
            $phpToHtml2 = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $input = filter_input(INPUT_POST, "searchInput", FILTER_SANITIZE_SPECIAL_CHARS);

                $sql1 = "SELECT * FROM ocorrencia";
                $resultInput = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($resultInput) > 0) {
                    while ($rowInput = mysqli_fetch_assoc($resultInput)) {
                        // echo stripAccents($rowInput['localizacao']);
                        // echo stripAccents($input);
                        if ($rowInput['categoria'] == $input) {
                            $phpToHtml2 = "<div class='col-3'>
                            <div class='card h-100'>
                                <div class='card-img-top' id='zoom'><a href='#'><img src='images/{$rowInput['foto_ocorrencia']}' style='height: 300px;'></a></div>
                                <div class='card-body d-flex flex-column'>
                                    <div class='d-flex justify-content-between mb-3'>
                                        <div class='cat'><span class='badge text-bg-secondary text-wrap p-1' style='width=6rem;'>{$rowInput['categoria']}</span></div><div class='small fw-medium text-wrap' style='width=3rem;'>{$rowInput['localizacao']}</div>
                                    </div>
                                    <h3><a href='#' class='fs-4 text-decoration-none'>{$rowInput['descricao']}</a></h3>
                                    <div class='estado-info' style='display: flex; flex-direction: column; justify-content: flex-end; height: 100%;'>
                                        <p style='text-align: right; margin-top: 5px;'>Estado: {$rowInput['estado']}</p>
                                    </div>
                                </div>
                            </div>
                          </div>";
                            echo $phpToHtml2;
                        } elseif ($rowInput['sub_categoria'] == $input) {
                            $phpToHtml2 = "<div class='col-3'>
                            <div class='card h-100'>
                                <div class='card-img-top' id='zoom'><a href='#'><img src='images/{$rowInput['foto_ocorrencia']}' style='height: 300px;'></a></div>
                                <div class='card-body d-flex flex-column'>
                                    <div class='d-flex justify-content-between mb-3'>
                                        <div class='cat'><span class='badge text-bg-secondary text-wrap p-1' style='width=6rem;'>{$rowInput['sub_categoria']}</span></div><div class='small fw-medium text-wrap' style='width=3rem;'>{$rowInput['localizacao']}</div>
                                    </div>
                                    <h3><a href='#' class='fs-4 text-decoration-none'>{$rowInput['descricao']}</a></h3>
                                    <div class='estado-info' style='display: flex; flex-direction: column; justify-content: flex-end; height: 100%;'>
                                        <p style='text-align: right; margin-top: 5px;'>Estado: {$rowInput['estado']}</p>
                                    </div>
                                </div>
                            </div>
                          </div>";
                            echo $phpToHtml2;
                        } elseif ($rowInput['localizacao'] == $input) {
                            $phpToHtml2 = "<div class='col-3'>
                            <div class='card h-100'>
                                <div class='card-img-top' id='zoom'><a href='#'><img src='images/{$rowInput['foto_ocorrencia']}' style='height: 300px;'></a></div>
                                <div class='card-body d-flex flex-column'>
                                    <div class='d-flex justify-content-between mb-3'>
                                        <div class='cat'><span class='badge text-bg-secondary text-wrap p-1' style='width=6rem;'>{$rowInput['categoria']}</span></div><div class='small fw-medium text-wrap' style='width=3rem;'>{$rowInput['localizacao']}</div>
                                    </div>
                                    <h3><a href='#' class='fs-4 text-decoration-none'>{$rowInput['descricao']}</a></h3>
                                    <div class='estado-info' style='display: flex; flex-direction: column; justify-content: flex-end; height: 100%;'>
                                        <p style='text-align: right; margin-top: 5px;'>Estado: {$rowInput['estado']}</p>
                                    </div>
                                </div>
                            </div>
                          </div>";
                            echo $phpToHtml2;
                        }elseif ($rowInput['estado'] == $input) {
                            $phpToHtml2 = "<div class='col-3'>
                            <div class='card h-100'>
                                <div class='card-img-top' id='zoom'><a href='#'><img src='images/{$rowInput['foto_ocorrencia']}' style='height: 300px;'></a></div>
                                <div class='card-body d-flex flex-column'>
                                    <div class='d-flex justify-content-between mb-3'>
                                        <div class='cat'><span class='badge text-bg-secondary text-wrap p-1' style='width=6rem;'>{$rowInput['categoria']}</span></div><div class='small fw-medium text-wrap' style='width=3rem;'>{$rowInput['localizacao']}</div>
                                    </div>
                                    <h3><a href='#' class='fs-4 text-decoration-none'>{$rowInput['descricao']}</a></h3>
                                    <div class='estado-info' style='display: flex; flex-direction: column; justify-content: flex-end; height: 100%;'>
                                        <p style='text-align: right; margin-top: 5px;'>Estado: {$rowInput['estado']}</p>
                                    </div>
                                </div>
                            </div>
                          </div>";
                            echo $phpToHtml2;
                            
                        }
                    }
                }
            }
            ?>
        </div>



    </div>
    
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>