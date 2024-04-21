<?php
    $sqlLocalizacao = "SELECT * FROM ocorrencia ORDER BY localizacao ASC";
    $resultadoLocalizacao = mysqli_query($conn, $sqlLocalizacao);

    if(mysqli_num_rows($resultadoLocalizacao) > 0){
        while($rowLocalizacao = mysqli_fetch_assoc($resultadoLocalizacao)){
            $phpToHtml = "<div class='col-3'>
            <div class='card h-100'>
                <div class='card-img-top' id='zoom'><a href='#'><img src='images/{$rowLocalizacao['foto_ocorrencia']}' style='height: 300px;'></a></div>
                <div class='card-body d-flex flex-column'>
                    <div class='d-flex justify-content-between mb-3'>
                        <div class='cat'><span class='badge text-bg-secondary text-wrap p-1' style='width=6rem;'>{$rowLocalizacao['categoria']}</span></div><div class='small fw-medium text-wrap' style='width=3rem;'>{$rowLocalizacao['localizacao']}</div>
                    </div>
                    <h3><a href='#' class='fs-4 text-decoration-none'>{$rowLocalizacao['descricao']}</a></h3>
                    <div class='estado-info' style='display: flex; flex-direction: column; justify-content: flex-end; height: 100%;'>
                        <p style='text-align: right; margin-top: 5px;'>Estado: {$rowLocalizacao['estado']}</p>
                    </div>
                </div>
            </div>
          </div>";
            echo $phpToHtml;
        }
   
    }
?>