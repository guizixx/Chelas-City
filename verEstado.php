<?php
    $sqlEstado = "SELECT * FROM ocorrencia ORDER BY estado ASC";
    $resultadoEstado = mysqli_query($conn, $sqlEstado);

    if(mysqli_num_rows($resultadoEstado) > 0){
        while($rowEstado = mysqli_fetch_assoc($resultadoEstado)){
            $phpToHtml = "<div class='col-3'>
            <div class='card h-100'>
                <div class='card-img-top' id='zoom'><a href='#'><img src='images/{$rowEstado['foto_ocorrencia']}' style='height: 300px;'></a></div>
                <div class='card-body d-flex flex-column'>
                    <div class='d-flex justify-content-between mb-3'>
                        <div class='cat'><span class='badge text-bg-secondary text-wrap p-1' style='width=6rem;'>{$rowEstado['categoria']}</span></div><div class='small fw-medium text-wrap' style='width=3rem;'>{$rowEstado['localizacao']}</div>
                    </div>
                    <h3><a href='#' class='fs-4 text-decoration-none'>{$rowEstado['descricao']}</a></h3>
                    <div class='estado-info' style='display: flex; flex-direction: column; justify-content: flex-end; height: 100%;'>
                        <p style='text-align: right; margin-top: 5px;'>Estado: {$rowEstado['estado']}</p>
                    </div>
                </div>
            </div>
          </div>";
            echo $phpToHtml;
        }
   
    }
?>

