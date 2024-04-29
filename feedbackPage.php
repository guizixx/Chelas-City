<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <li class="nav-item">
                    <a href="sobre.php" class="nav-link" id="linksCabecalho">Sobre</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link" id="navButoes"><i class='bx bx-support'></i></a>
                </li>
                <li class="nav-item me-3 ms-2">
                    <a href="register.php" type="button" class="btn btn-lg btn-secondary rounded-4 w-10 fs-6 mt-2">Regista-te</a>
                </li>
                <li class="nav-item me-3">
                    <a href="loginPage.php" type="button" class="btn btn-lg btn-primary rounded-4 w-10 fs-6 mt-2">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <form style="text-align:center; border:solid 1px; margin:100px; border-radius:10px; background-color:white; padding:20px; max-width:1500px; width:100%; height:500px;">
        <div class="mb-3">
            <label for="avaliacao" class="form-label">Rating Rate</label><br>
            <span class="fa fa-star checked" onclick="changeRating(1)"></span>
            <span class="fa fa-star checked" onclick="changeRating(2)"></span>
            <span class="fa fa-star checked" onclick="changeRating(3)"></span>
            <span class="fa fa-star" onclick="changeRating(4)"></span>
            <span class="fa fa-star" onclick="changeRating(5)"></span>
            <input type="hidden" id="avaliacao" name="avaliacao" value="3"> <!-- Este campo hidden armazenará a avaliação selecionada -->
        </div>
        <div class="mb-3" style="margin-top:50px; ">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="button" class="btn btn-success" style="float: right;">Submeter</button>
    </form>

    <script>
        function changeRating(rating) {
            // Obtém todas as estrelas
            var stars = document.querySelectorAll('.fa-star');

            // Atualiza a cor das estrelas de acordo com a avaliação selecionada
            for (var i = 0; i < stars.length; i++) {
                if (i < rating) {
                    stars[i].classList.add('checked');
                } else {
                    stars[i].classList.remove('checked');
                }
            }

            // Atualiza o valor do campo hidden com a avaliação selecionada
            document.getElementById('avaliacao').value = rating;
        }
    </script>

    <style>
        .fa-star {
            font-size: 36px;
            cursor: pointer;
            color: #ccc;
        }

        .checked {
            color: orange;
        }
    </style>
    
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>