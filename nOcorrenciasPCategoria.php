<?php
    $sqlManutencaodeInfraestrutura = "SELECT COUNT(*) as total FROM ocorrencia WHERE categoria = 'Manutenção de Infraestrutura'";
    $sqlSegurancaPublica = "SELECT COUNT(*) as total FROM ocorrencia WHERE categoria = 'Segurança Pública'";
    $sqlProblemasAmbientais = "SELECT COUNT(*) as total FROM ocorrencia WHERE categoria = 'Problemas Ambientais'";
    $sqlTransporteeTransito = "SELECT COUNT(*) as total FROM ocorrencia WHERE categoria = 'Transporte e Trânsito'";
    $sqlBemEstarComunitario = "SELECT COUNT(*) as total FROM ocorrencia WHERE categoria = 'Bem-estar Comunitário'";


    $resultadoManutencaodeInfraestrutura = mysqli_query($conn, $sqlManutencaodeInfraestrutura);
    $resultadoSegurancaPublica = mysqli_query($conn, $sqlSegurancaPublica);
    $resultadoProblemasAmbientais = mysqli_query($conn, $sqlProblemasAmbientais);
    $resultadoTransporteeTransito = mysqli_query($conn, $sqlTransporteeTransito);
    $resultadoBemEstarComunitario = mysqli_query($conn, $sqlBemEstarComunitario);


    $row1 = mysqli_fetch_assoc($resultadoManutencaodeInfraestrutura);
    $row2 = mysqli_fetch_assoc($resultadoSegurancaPublica);
    $row3 = mysqli_fetch_assoc($resultadoProblemasAmbientais);
    $row4 = mysqli_fetch_assoc($resultadoTransporteeTransito);
    $row5 = mysqli_fetch_assoc($resultadoBemEstarComunitario);

    $h2 = "<div class = 'row justify-content-center border-bottom pb-3'>Manutenção de Infraestrutura -> {$row1['total']}</div>
           <div class = 'row justify-content-center border-bottom pb-3 pt-3'>Segurança Pública -> {$row2['total']}</div>
           <div class = 'row justify-content-center border-bottom pb-3 pt-3'>Problemas Ambientais -> {$row3['total']}</div>
           <div class = 'row justify-content-center border-bottom pb-3 pt-3'>Transporte e Trânsito -> {$row4['total']}</div>
           <div class = 'row justify-content-center pt-3'>Bem-estar Comunitário -> {$row5['total']}</div>";
    echo $h2;
?>