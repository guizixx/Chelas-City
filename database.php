<?php
    $servername = "appserver-01.alunos.di.fc.ul.pt";
    $username = "asw23";
    $password = "liafgui123";
    $dbname = "asw23";
    // Cria a ligação à BD
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, "utf8");
    // Verifica a ligação à BD
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>