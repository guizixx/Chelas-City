
<?php

        $sqlIncial = "SELECT * FROM ocorrencia";
        $resultadoInicial = mysqli_query($conn, $sqlIncial);
        while($rowInicial = mysqli_fetch_assoc($resultadoInicial)){
            $phpToHtml = "<div class='col-3'>
                            <div class='card h-100'>
                                <div class='card-img-top' id='zoom'><a href='#'><img src='images/{$rowInicial['foto_ocorrencia']}' style='height: 300px;'></a></div>
                                <div class='card-body d-flex flex-column'>
                                    <div class='d-flex justify-content-between mb-3'>
                                        <div class='cat'><span class='badge text-bg-secondary text-wrap p-1' style='width=6rem;'>{$rowInicial['categoria']}</span></div><div class='small fw-medium text-wrap' style='width=3rem;'>{$rowInicial['localizacao']}</div>
                                    </div>
                                    <h3><a href='#' class='fs-4 text-decoration-none'>{$rowInicial['descricao']}</a></h3>
                                </div>
                            </div>
                          </div>";
        echo $phpToHtml;
        }
?>
            