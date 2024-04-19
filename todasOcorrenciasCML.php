
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
                            <div class='col border' id='headerSearch'>Gerir ocorrência</div>
                       </div>";
        echo $tableHeader;
        $sqlIncial = "SELECT * FROM ocorrencia";
        $resultadoInicial = mysqli_query($conn, $sqlIncial);
        while($rowInicial = mysqli_fetch_assoc($resultadoInicial)){
            $phpToHtml = "<div class='row' style='background: #d3d3d3;'>
                            <div class='col border'>{$rowInicial['id']}</div>
                            <div class='col border'>{$rowInicial['estado']}</div>
                            <div class='col border'>{$rowInicial['descricao']}</div>
                            <div class='col border'>{$rowInicial['categoria']}</div>
                            <div class='col border'>{$rowInicial['sub_categoria']}</div>
                            <div class='col border'>{$rowInicial['localizacao']}</div>
                            <div class='col border'>{$rowInicial['id_utilizador']}</div>
                            <div class='col border'>{$rowInicial['reg_date']}</div>
                        </div>";
        echo $phpToHtml;
        }
?>
            