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
    //$todos = Usuario::search("oo");
    //echo json_encode($todos);

    //INSERINDO NOVO USUARIO
    //$aluno = new  Usuario("aluno","@alun0");
    //$aluno->insert();
    //echo $aluno;

    //ATUALIZANDO UM USUARIO
    //$pessoa = new Usuario();
    //$pessoa->loadById(7);
    //$pessoa->update("Professor","souprof");
    //echo $pessoa;

    //DELETANDO UM USUARIO
    $pessoa = new Usuario();
    $pessoa->loadById(6);
    $pessoa->delete();
    echo $pessoa;
?>