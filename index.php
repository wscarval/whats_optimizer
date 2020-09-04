<?php
     /**Caminho para URL Amigavel*/
     define('FULL_PATH','http://localhost/_whatsOptimizer/_pages/');
      /** Conexao Banco de Dados */
      /* Constantes */
      define("USERDB","USUARIO");
      define("PASSDB","SENHA");
      define("SERVDB","127.0.0.1");
      define("BASEDB","BANCO");
     /************* */

    /* Autoload */
    $autoload = function($autload_class){
        include($autload_class.'.php');
    };
    //Registro para o reconhecimento do autoload
    spl_autoload_register($autoload);
    /********************************* */

    $whatsOP = new App();
    $whatsOP->getPages();


?>
