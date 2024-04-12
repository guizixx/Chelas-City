<?php

    $tableHeader = "<div class='row'>
                        <div class='col border' id='headerSearch'>Id</div>
                        <div class='col border' id='headerSearch'>Categoria</div>
                        <div class='col border' id='headerSearch'>Estado</div>
                        <div class='col border' id='headerSearch'>Descrição</div>    
                        <div class='col border' id='headerSearch'>Sub-categoria</div>
                        <div class='col border' id='headerSearch'>Localização</div>
                        <div class='col border' id='headerSearch'>Id do utilizador</div>
                        <div class='col border' id='headerSearch'>Data de registo</div>
                   </div>";
    echo $tableHeader;
    $sqlCategoria = "SELECT * FROM ocorrencia ORDER BY categoria ASC";
    $resultadoCategoria = mysqli_query($conn, $sqlCategoria);

    if(mysqli_num_rows($resultadoCategoria) > 0){
        while($rowCategoria = mysqli_fetch_assoc($resultadoCategoria)){
            $phpToHtml = "<div class='row' style='background: #d3d3d3;'>
                            <div class='col border'>{$rowCategoria['id']}</div>
                            <div class='col border'>{$rowCategoria['categoria']}</div>
                            <div class='col border'>{$rowCategoria['estado']}</div>
                            <div class='col border'>{$rowCategoria['descricao']}</div>
                            <div class='col border'>{$rowCategoria['sub_categoria']}</div>
                            <div class='col border'>{$rowCategoria['localizacao']}</div>
                            <div class='col border'>{$rowCategoria['id_utilizador']}</div>
                            <div class='col border'>{$rowCategoria['reg_date']}</div>
                         </div>";
            echo $phpToHtml;
        }  
    }
?>