<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Broadcast</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo FULL_PATH; ?>css/estilo.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    
</head>

<header>
<link rel="stylesheet" href="style.css" type="text/css"/>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <a class="navbar-brand text-light" href="#"><img class="buto rounded-circle" width="60px" src="_pages/images/ico.png">&nbsp; WhatsOP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav menu_texts">
            <li class="nav-item active">
              <a class="navbar menu_texts" href="Home">Adicionar<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="navbar menu_texts" href="ListarContacts">Listar Números<span class="sr-only">(current)</span></a>
            </li>
        </ul>
      </div>
    </nav>
</header>

<body>
  <main>

    <!-- Section shadow -->
    <section id="shadow_menu"></section>
    <!-- End Section shadow -->


    <div class="box"><!--Class Box-->

        <section class="banner"><!-- Section banner -->
        <!-- Class Overlay -->
        <div class="overlay"></div>
        <!--End Overlay-->

       <div class="container"><!-- Container-->
        <div class="row">
         <div class="text-center col-md-1">
          </div>
           <div class="text-center col-md-10"><!-- Col Meio-->
       
           <!-- Listagem tabela bootstrap-->
           <table class="table table-striped table-dark">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Telefone</th>
                <th scope="col">Nome</th>
                <th scope="col">Deletar</th>
                <th scope="col">Enviar Mensagem</th>
              </tr>
            </thead>
            <tbody>
            <!-- Inicio da listagem dos numeros -->
            <?php
              //Intanciamento do PDO
              $create = new PDO('mysql:host='.SERVDB.';dbname='.BASEDB,USERDB,PASSDB);
              /******************* */
              //Select telefones
              $select_num = $create->query("SELECT * FROM telefones");
              /************************************************* */
              //Select Mensagem
              $select_msg = $create->query("SELECT * FROM msg_padrao");
              /************************************** */
              $msg_padrao = $select_msg->fetchAll(PDO::FETCH_ASSOC);
              /**MSG */
              foreach($msg_padrao as $msg_padrao){
                $mensagem = $msg_padrao["msg_padrao"];
              }
              /********** */

              /**Dados**/
              foreach($select_num as $numeros){
                  echo '
                  <tr>
                    <th scope="row">'.$numeros["idtel"].'</th>
                    <td>'.$numeros["numero"].'</td>
                    <td>'.$numeros["tel_nome"].'</td>
                    <td><a target="_blank" class="btn btn-danger" href="DeletarContacts?idtel='.$numeros["idtel"].'">X</a></td>
                    <td><a target="_blank" class="btn btn-success" href="https://api.whatsapp.com/send?phone='.$numeros["numero"].'&text='.$mensagem.'">Enviar Mensagem</a></td>
                  </tr>
                  <tr>
                  ';
              }
              /* Monstrar Mensagem Padrao */  
              echo '<div class="details_box">MENSAGEM PADRÃO: '.$mensagem.'</div>';

            ?>
            


            </tbody>
          </table>
           <!--//Listagem tabela bootstrap-->
         

            <!-- Section Errors -->
            <section id="menu_texts">
              <?php
              if(isset($_GET['e'])){
                $e = $_GET['e'];
                if($e == '1'){
                  echo '<span class="menu_texts">Erro ao inserir dados[Duplicados ou inválido], verifique o número e tente novamente!</span>';
                } elseif($e == 'ok') {
                  echo '<span class="menu_texts">Número adicionado a listagem!</span>';
                 } else { echo '<span class="menu_texts">Erro de conexão ao banco de dados!</span>'; }
              }
              ?>
              </section>
            <!-- End Section Errors -->

          </div><!-- //Col Meio-->
          <div class="text-center col-md-1">
          </div>
          </div> <!-- //Div Row-->     
       
                    

        </div><!-- End Container-->
        </section><!-- End Section baner -->
        <div>
    </div><!--End Class Box-->
    </div><!-- //Centralizar o box-->
</main>



</body>
</html>