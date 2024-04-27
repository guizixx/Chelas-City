<?php
session_start();
include("database.php");
if (!isset($_SESSION['valid'])) {
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageStyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Registar ocorrências</title>
</head>

<body>

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
                        while ($result = mysqli_fetch_assoc($query)) {
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


    <form class="row g-3 needs-validation mt-5 ms-3 me-3" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label" id="estilo-label" style="color: blue;">Localização</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Introduza a localização" required>
        </div>
        <div class="col-md-4" style="margin-left: 200px;">
            <label for="validationCustom02" class="form-label">Categoria</label>
            <select class="form-select" id="validationCustom02" required>
                <option selected disabled value="">Choose...</option>
                <option>Manutenção de Infraestrutura</option>
                <option>Segurança Pública</option>
                <option>Problemas Ambientais</option>
                <option>Transporte e Trânsito</option>
                <option>Bem-Estar Comunitário</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom02" class="form-label">Descrição</label>
            <div class="input-group">
                <span class="input-group-text">Introduza o texto aqui</span>
                <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">State</label>
            <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Registrar Ocorrência</button>
        </div>
    </form>

    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>