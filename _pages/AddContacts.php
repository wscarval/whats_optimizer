<?php

    /** Dados Telefone, nome e ID*/

    //Negar Acesso direto
    if(!isset($_POST['numero'])) {
        header('Location: Home');
    } else {

    $telefone = $_POST['numero'];
    $nome = $_POST['nomeVinc'];

   

      try {
        $create = new PDO('mysql:host='.SERVDB.';dbname='.BASEDB,USERDB,PASSDB);
        $create->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        header('Location: Home?e=1');
    } catch (PDOException $e) {
        echo $e->getMessage();
        header('Location: Home?e=1045');
    } finally{
      
    }

    $inserir = $create->prepare('INSERT INTO telefones (numero,tel_nome) VALUES (?,?)');
   

    if($inserir->execute(array('55'.$telefone,$nome))){
        header('Location: Home?e=ok');
    } else {
        header('Location: Home?e=1');
    }

      /* CONFIGURAÇÃO DO BANCO DE DADOS MYSQLI
        $connect = mysqli_connect(SERVDB,USERDB,PASSDB,BASEDB);
        mysqli_set_charset($connect,"utf8");
     CONFIURAÇÃO DO BANCO DE DADOS PDO */

}

    
