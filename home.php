<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagestyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Lisboa+Perto</title>
</head>
<body>
    
    <nav>
        <div class="left">
            <div class="logo">
                <img src="logo1.jpg">
            </div>
            <div class="links">
                <a href="loginPage.php">Home</a>
                <a href="#">Customer Help</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
            </div>
        </div>

        <div class="buttons">
            <a href="#"><i class='bx bx-support'></i></a>
            <a href="#"><i class='bx bx-user'></i></a>
        </div>

    </nav>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="info">
            <h1>Pesquise aqui as ocorrências por localidade</h1>
        </div>
        <!-- <div class="buttons">
            <button class="see-all">Ver Ocorrências</button>
        </div> -->
        <div class="search">
            <input type="text" name="localizacao" placeholder="Pesquisa a localidade">
            <button type="submit" name="searchBtn"><i class='bx bx-search'></i></button>
        </div>
    </form>
    <?php
        $h1 = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $localizacao = filter_input(INPUT_POST, "localizacao", FILTER_SANITIZE_SPECIAL_CHARS);

            $sql = "SELECT * FROM ocorrencia WHERE localizacao = '$localizacao'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $h1 = "<div class='ocorrItem'>
                            <div class='ocorrImage'>
                                <img src='logo1.jpg'>
                            </div>
                            <div class='ocorrDescricao'>
                                <div class='informacao'>
                                    <h2>{$row['categoria']}</h2>
                                    <span>|</span>
                                    <h2>{$row['sub_categoria']}</h2>
                                </div>
                                <h5>{$row['localizacao']}</h5>
                                <p>{$row['descricao']}</p>
                            </div>                            
                       </div>";
            }
    }

    mysqli_close($conn);
    ?>
    <?php echo $h1 ?>
</body>
</html>