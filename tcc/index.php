<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <title>SGI - Sistema Genérico da Informação</title>
  </head>
<body>
    <!--Modelo será usado primeiramente para desktop, após isso, será convertido para também funcionar em mobile ^^ -->
    <?php
      include "menu.php";
    ?>
    


    <div class="container">

    <?php
      $fd = $pg = "";

      if(isset($_GET["fd"])){
        $fd = trim($_GET["fd"]);
      }

      if(isset($_GET["pg"])){
        $pg = trim($_GET["pg"]);
      }

      if(empty($pg)){
        $pagina = "dashboard.php";
      }else{
        $pagina = $fd."/".$pg.".php";
      }

      if(file_exists($pagina)){
        include "$pagina";
      }else{
        include "erro.php";
      }

    ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>