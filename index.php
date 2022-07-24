<?php
    require_once("config.php");

    $pessoa = new Usuario();

    $pessoa->loadById(5);

    echo $pessoa;
?>