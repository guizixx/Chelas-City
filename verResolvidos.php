<?php
    $sqlEstado = "SELECT * FROM ocorrencia ORDER BY estado ASC";
    $resultadoEstado = mysqli_query($conn, $sqlEstado);

    if(mysqli_num_rows($resultadoEstado) > 0){
        while($rowEstado = mysqli_fetch_assoc($resultadoEstado)){
            if ($rowEstado['estado'] == 'resolvido') {
            $phpToHtml = "<div class='col-3'>
            <div class='card h-100'>
                <div class='card-img-top' id='zoom'><a href='#'><img src='images/{$rowEstado['foto_ocorrencia']}' style='height: 300px;'></a></div>
                <div class='card-body d-flex flex-column'>
                    <div class='d-flex justify-content-between mb-1'>
                        <div class='cat'><span class='badge text-bg-secondary text-wrap p-1' style='width=9rem; font-size:15px;'>{$rowEstado['categoria']}</span></div><div class='small fw-medium text-wrap' style='width=3rem;'>{$rowEstado['localizacao']}</div>
                    </div>
                    <div class='d-flex justify-content-between mb-2'>
                        <div class='badge text-bg-success small fw-medium text-wrap p-1' style='width=3rem;'>Subcategoria: {$rowEstado['sub_categoria']}</div>
                    </div>
                    <h3><a href='#' class='fs-4 text-decoration-none'>{$rowEstado['descricao']}</a></h3>
                    <div class='d-flex justify-content-between mb-3'>
                        <div class='cat'><span class='small fw-medium text-wrap ms-auto' style='width=3rem;'>Estado: {$rowEstado['estado']}</span></div>
                    </div>
                </div>
            </div>
          </div>";
            echo $phpToHtml;
            }
        }

    }
?>