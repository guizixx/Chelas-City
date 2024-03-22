<?php
    $db_server = "appserver-01.alunos.di.fc.ul.pt";
    $db_user = "asw23";
    $db_pass = "liafgui123";
    $db_name = "asw23";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception){
        echo "Could not connect! <br>";
    }
?>