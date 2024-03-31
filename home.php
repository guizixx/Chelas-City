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
            <input type="text" name="searchInput" placeholder="Pesquisa por ocorrências">
            <button type="submit" name="searchBtn"><i class='bx bx-search'></i></button>
    </form>

    <?php
            // function stripAccents($str) {
            //     return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            // }

            function stripAccents($stripAccents){
                return strtr($stripAccents,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
              }


            
    ?>

    <?php
    $phpToHtml2 = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input = filter_input(INPUT_POST, "searchInput", FILTER_SANITIZE_SPECIAL_CHARS);

        $sql1 = "SELECT * FROM ocorrencia";
        $resultInput = mysqli_query($conn, $sql1);
        
        if(mysqli_num_rows($resultInput) > 0){
            while($rowInput = mysqli_fetch_assoc($resultInput)){
                // echo stripAccents($rowInput['localizacao']);
                // echo stripAccents($input);
                if (stripAccents($rowInput['categoria']) == stripAccents($input)){
                    $phpToHtml2 = "<div class='ocorrItem'>
                            <div class='ocorrImage'>
                                <img src='logo1.jpg'>
                            </div>
                            <div class='ocorrDescricao'>
                                <div class='informacao'>
                                    <h2>{$rowInput['categoria']}</h2>
                                    <span>|</span>
                                    <h2>{$rowInput['sub_categoria']}</h2>
                                </div>
                                <h5>{$rowInput['localizacao']}</h5>
                                <p>{$rowInput['descricao']}</p>
                            </div>                            
                        </div>";
                    echo $phpToHtml2;
                }
                elseif (stripAccents($rowInput['localizacao']) == stripAccents($input)){
                    $phpToHtml2 = "<div class='ocorrItem'>
                            <div class='ocorrImage'>
                                <img src='logo1.jpg'>
                            </div>
                            <div class='ocorrDescricao'>
                                <div class='informacao'>
                                    <h2>{$rowInput['categoria']}</h2>
                                    <span>|</span>
                                    <h2>{$rowInput['sub_categoria']}</h2>
                                </div>
                                <h5>{$rowInput['localizacao']}</h5>
                                <p>{$rowInput['descricao']}</p>
                            </div>                            
                        </div>";
                    echo $phpToHtml2;
                }
        
                
            }
       
        }


    }
    ?> 
    

</body>
</html>