<?php
    $sqlNOcorrencias = "SELECT COUNT(*) as total FROM ocorrencia";
    $resultadoNOcorrencias = mysqli_query($conn, $sqlNOcorrencias);
    
    $rowNOcorrencias = mysqli_fetch_assoc($resultadoNOcorrencias);
    $h1 = "<div class = 'p-3'>{$rowNOcorrencias['total']} ocorrências</div>";
    echo $h1;
?>