<?php

                $input = filter_input(INPUT_POST, "searchInput", FILTER_SANITIZE_SPECIAL_CHARS);

                $sql1 = "SELECT * FROM ocorrencia";
                $resultInput = mysqli_query($conn, $sql1);

                if(mysqli_num_rows($resultInput) > 0){
                            $tableHeader = "<div class='row'>
                                                <div class='col border' id='headerSearch'>Id</div>
                                                <div class='col border' id='headerSearch'>Estado</div>
                                                <div class='col border' id='headerSearch'>Descrição</div>
                                                <div class='col border' id='headerSearch'>Categoria</div>
                                                <div class='col border' id='headerSearch'>Sub-categoria</div>
                                                <div class='col border' id='headerSearch'>Localização</div>
                                                <div class='col border' id='headerSearch'>Id do utilizador</div>
                                                <div class='col border' id='headerSearch'>Data de registo</div>
                                           </div>";
                            echo $tableHeader;
                    while($rowInput = mysqli_fetch_assoc($resultInput)){
                        if ($rowInput['categoria'] == $input){
                            $phpToHtml2 = "<div class='row' style='background: #d3d3d3;'>
                                                <div class='col border'>{$rowInput['id']}</div>
                                                <div class='col border'>{$rowInput['estado']}</div>
                                                <div class='col border'>{$rowInput['descricao']}</div>
                                                <div class='col border'>{$rowInput['categoria']}</div>
                                                <div class='col border'>{$rowInput['sub_categoria']}</div>
                                                <div class='col border'>{$rowInput['localizacao']}</div>
                                                <div class='col border'>{$rowInput['id_utilizador']}</div>
                                                <div class='col border'>{$rowInput['reg_date']}</div>
                                           </div>";
                            echo $phpToHtml2;
                        }
                        else if ($rowInput['localizacao'] == $input){
                            $phpToHtml3 = "<div class='row' style='background: #d3d3d3;'>
                                                <div class='col border'>{$rowInput['id']}</div>
                                                <div class='col border'>{$rowInput['estado']}</div>
                                                <div class='col border'>{$rowInput['descricao']}</div>
                                                <div class='col border'>{$rowInput['categoria']}</div>
                                                <div class='col border'>{$rowInput['sub_categoria']}</div>
                                                <div class='col border'>{$rowInput['localizacao']}</div>
                                                <div class='col border'>{$rowInput['id_utilizador']}</div>
                                                <div class='col border'>{$rowInput['reg_date']}</div>
                                           </div>";
                            echo $phpToHtml3;
                        }
                        else if ($rowInput['estado'] == $input){
                            $phpToHtml4 = "<div class='row' style='background: #d3d3d3;'>
                                                <div class='col border'>{$rowInput['id']}</div>
                                                <div class='col border'>{$rowInput['estado']}</div>
                                                <div class='col border'>{$rowInput['descricao']}</div>
                                                <div class='col border'>{$rowInput['categoria']}</div>
                                                <div class='col border'>{$rowInput['sub_categoria']}</div>
                                                <div class='col border'>{$rowInput['localizacao']}</div>
                                                <div class='col border'>{$rowInput['id_utilizador']}</div>
                                                <div class='col border'>{$rowInput['reg_date']}</div>
                                          </div>";
                            echo $phpToHtml4;
                        }
                        
                    }
            
                }
    ?> 