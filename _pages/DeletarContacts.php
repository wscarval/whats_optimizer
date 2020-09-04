<?php

    /** Dados Telefone, nome e ID*/

    //Negar Acesso direto
    if(!isset($_GET['idtel'])) {
        header('Location: ListarContacts');
    } else {

   

      try {
        $create = new PDO('mysql:host='.SERVDB.';dbname='.BASEDB,USERDB,PASSDB);
        $create->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        header('Location: ListarContacts?e=1');
    } catch (PDOException $e) {
        echo $e->getMessage();
        header('Location: ListarContacts?e=1045');
    } finally{
      
    }

    $inserir = $create->prepare('DELETE FROM telefones WHERE idtel = ?');
   

    if($inserir->execute(array($_GET['idtel']))){
        header('Location: ListarContacts?e=ok');
    } else {
        header('Location: ListarContacts?e=1');
    }

      /* CONFIGURAÇÃO DO BANCO DE DADOS MYSQLI
        $connect = mysqli_connect(SERVDB,USERDB,PASSDB,BASEDB);
        mysqli_set_charset($connect,"utf8");
     CONFIURAÇÃO DO BANCO DE DADOS PDO */

}

    
