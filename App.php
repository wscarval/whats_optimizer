<?php

 

/* Classe APP, verifica se existe páginas para redirecionamento correto */

class App
{
  //private $debug;
   
  public function getPages()
   {
      
      /* Variavel URL recebe a variavel url configurada no .htaccess, pagando somente o primeiro caminho separando pela barra:
       exemplo01/exemplo02 = exemplo01 */
       if(isset($_GET['url'])){
       $url = explode(DIRECTORY_SEPARATOR,$_GET['url'])[0];
       $url = ucfirst($url);
       } else {
          $url = 'Home';
       }
       /*
       $this->debug = 1;
       if($debug = 1){
          //Modo debug
       var_dump('<pre>'.$url.'</pre>');
       
       }*/

       //Verificação se a página solicitada existe na pasta pages
       if(file_exists('_pages'.DIRECTORY_SEPARATOR.$url.'.php')){
          include('_pages'.DIRECTORY_SEPARATOR.$url.'.php');
       } else {
          include('_pages'.DIRECTORY_SEPARATOR.'404.php');
       }
   } 
}