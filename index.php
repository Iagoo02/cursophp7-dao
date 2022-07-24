<?php
    require_once("config.php");

    //Carregando um usuario pelo id.
    //$pessoa = new Usuario();
    //$pessoa->loadById(5);
    //echo $pessoa;

    //Buscando todos os usuarios
    //$todos = Usuario::todosUsuarios();
    //echo json_encode($todos);

    //Tentando fazer login
    //$pessoa = new Usuario();
    //$pessoa->login("jose","arroz");
    //echo $pessoa;

    //Procurando usuario por nome
    $todos = Usuario::search("oo");
    echo json_encode($todos);
?>