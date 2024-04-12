<?php 
    $sqlP = "SELECT COUNT(*) as total1 FROM ocorrencia WHERE estado = 'resolvido'";
    $sqlT = "SELECT COUNT(*) as total2 FROM ocorrencia";
    $resultadoP = mysqli_query($conn, $sqlP);
    $resultadoT = mysqli_query($conn, $sqlT);
    
    $rowP = mysqli_fetch_assoc($resultadoP);
    $rowT = mysqli_fetch_assoc($resultadoT);
    $percentagem = ($rowP['total1']/$rowT['total2']) * 100;
    
    $h3 = "<div>{$percentagem}%</div>";
    echo $h3;
?>