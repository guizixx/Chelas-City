<?php
    $sqlCategoria = "SELECT * FROM ocorrencia ORDER BY categoria ASC";
    $resultadoCategoria = mysqli_query($conn, $sqlCategoria);

    if(mysqli_num_rows($resultadoCategoria) > 0){
        while($rowCategoria = mysqli_fetch_assoc($resultadoCategoria)){
            $phpToHtml = "<div class='col-3'>
            <div class='card h-100'>
                <div class='card-img-top' id='zoom'><a href='#'><img src='images/{$rowCategoria['foto_ocorrencia']}' style='height: 300px;'></a></div>
                <div class='card-body d-flex flex-column'>
                    <div class='d-flex justify-content-between mb-3'>
                        <div class='cat'><span class='badge text-bg-secondary text-wrap p-1' style='width=6rem;'>{$rowCategoria['categoria']}</span></div><div class='small fw-medium text-wrap' style='width=3rem;'>{$rowCategoria['localizacao']}</div>
                    </div>
                    <h3><a href='#' class='fs-4 text-decoration-none'>{$rowCategoria['descricao']}</a></h3>
                </div>
            </div>
          </div>";
            echo $phpToHtml;
        }
   
    }
?>