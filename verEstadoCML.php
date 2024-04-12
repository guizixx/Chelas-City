<?php
    $tableHeader = "<div class='row'>
                        <div class='col border' id='headerSearch'>Id</div>
                        <div class='col border' id='headerSearch'>Estado</div>
                        <div class='col border' id='headerSearch'>Descrição</div>
                        <div class='col border' id='headerSearch'>Categoria</div>
                        <div class='col border' id='headerSearch'>Sub-categoria</div>
                        <div class='col border' id='headerSearch'>Localização</div>
                        <div class='col border' id='headerSearch'>Id do utilizador</div>
                        <div class='col border' id='headerSearch'>Data de registo</div>
                   </div>";
    echo $tableHeader;
    $sqlEstado = "SELECT * FROM ocorrencia ORDER BY estado ASC";
    $resultadoEstado = mysqli_query($conn, $sqlEstado);

    if(mysqli_num_rows($resultadoEstado) > 0){
        while($rowEstado = mysqli_fetch_assoc($resultadoEstado)){
            $phpToHtml = "<div class='row' style='background: #d3d3d3;'>
                            <div class='col border'>{$rowEstado['id']}</div>
                            <div class='col border'>{$rowEstado['estado']}</div>
                            <div class='col border'>{$rowEstado['descricao']}</div>
                            <div class='col border'>{$rowEstado['categoria']}</div>
                            <div class='col border'>{$rowEstado['sub_categoria']}</div>
                            <div class='col border'>{$rowEstado['localizacao']}</div>
                            <div class='col border'>{$rowEstado['id_utilizador']}</div>
                            <div class='col border'>{$rowEstado['reg_date']}</div>
                        </div>";
            echo $phpToHtml;
        }
   
    }

?>