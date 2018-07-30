<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<title>searchCards</title>
<style>
    .card{
        float: left;
        margin: 10px;
    }

    .btn-link{
      float: right;
    }


</style>
</head>
<body>
  <div class="container">
    <h1 class="text-center">Selecione a pessoa</h1>
    <a href="baixarArquivo.php"><button type="button" class="btn btn-link">Baixar Arquivo PHP</button></a>
    <form class="form-inline my-2 my-lg-0" action="#" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Digite aqui" aria-label="Search" name="procurar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
    </form>
    
  </div>
  <div class="container">
      <?php
        require "conecta.php";
        
        if(isset($_POST["procurar"])){
            $nome = trim ($_POST["procurar"]);
            $nome = "%$nome%";
        }

        if(isset($nome)){
            $consulta = $pdo->prepare("SELECT * FROM pessoa WHERE nome LIKE ?");
            $consulta->bindParam(1, $nome);

        }else{ 
            $consulta = $pdo->prepare("SELECT * FROM pessoa order by nome");

        }

        $consulta->execute();
        
        $c = 0; //contador 
        
        while($dados = $consulta->fetch(PDO::FETCH_OBJ)){//ele só vai entrar no while se o $dados for verdadeiro
            $id = $dados->id;
            $nome = $dados->nome;
            //$foto = $dados->foto;
            //<img class='card-img-top' src='../arquivos/$foto' alt='$foto'>
            $cargo = $dados->cargo;
            $cpf = $dados->cpf;

            echo "<div class='card' style='width: 18rem;'>
                    <div class='card-body'>
                        <h5 class='card-title'>$nome</h5>
                        <p class='card-text'>ID: $id</p>
                        <p class='card-text'>CPF: $cpf</p>
                        <p class='card-text'>Cargo: $cargo</p>
                        <a href='#' class='btn btn-primary'>Legal!</a>
                    </div>
                </div>";

            $c = 1; //se ele entrar no while então ele valerá 1
        }

        if($c == 0){//se ele valer 0 é pq ele não entrou no while, logo, não encontrou nada. VALEU KAWASSAKI-SANNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN!
          echo 'Não foi possível encontrar a pessoa';
        }


        ?>
  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>