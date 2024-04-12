<?php
    $tableHeader = "<div class='row'>
                        <div class='col border' id='headerSearch'>Id</div>
                        <div class='col border' id='headerSearch'>Localização</div>
                        <div class='col border' id='headerSearch'>Estado</div>
                        <div class='col border' id='headerSearch'>Descrição</div>
                        <div class='col border' id='headerSearch'>Categoria</div>
                        <div class='col border' id='headerSearch'>Sub-categoria</div>
                        <div class='col border' id='headerSearch'>Id do utilizador</div>
                        <div class='col border' id='headerSearch'>Data de registo</div>
                   </div>";
    echo $tableHeader;
    $sqlLocalizacao = "SELECT * FROM ocorrencia ORDER BY localizacao ASC";
    $resultadoLocalizacao = mysqli_query($conn, $sqlLocalizacao);

    if(mysqli_num_rows($resultadoLocalizacao) > 0){
        while($rowLocalizacao = mysqli_fetch_assoc($resultadoLocalizacao)){
            $phpToHtml = "<div class='row' style='background: #d3d3d3;'>
                            <div class='col border'>{$rowLocalizacao['id']}</div>
                            <div class='col border'>{$rowLocalizacao['localizacao']}</div>
                            <div class='col border'>{$rowLocalizacao['estado']}</div>
                            <div class='col border'>{$rowLocalizacao['descricao']}</div>
                            <div class='col border'>{$rowLocalizacao['categoria']}</div>
                            <div class='col border'>{$rowLocalizacao['sub_categoria']}</div>
                            <div class='col border'>{$rowLocalizacao['id_utilizador']}</div>
                            <div class='col border'>{$rowLocalizacao['reg_date']}</div>
                        </div>";
            echo $phpToHtml;
        }
   
    }
?>