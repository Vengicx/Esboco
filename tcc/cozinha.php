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

    .btn-warning{
        float: right;
    }

</style>
</head>
<body>
  <div class="container">
      <?php
        require "conecta.php";

        $sql = ("SELECT * FROM pedido order by andamento");
        $consulta = $pdo->prepare($sql);
        
        if(!$consulta->execute()){
             echo"<script>alert('Erro ao consultar pedidos');</script>";
        }
        
        $c = 0; //contador 
        while($dados = $consulta->fetch(PDO::FETCH_OBJ)){//ele só vai entrar no while se o $dados for verdadeiro
            $id = $dados->id;
            $cliente= $dados->cliente;
            $sabor = $dados->sabor;
            $tamanho = $dados->tamanho;
            $horaPedido = $dados->horaPedido;
            $andamento = $dados->andamento;
            
            if($andamento == "1"){
                $botao = "<a href='salvar/prepararPedido.php?id=$id' class='btn btn-primary'>Preparar</a>";
            }elseif($andamento == "2"){
                $botao = "<a href='salvar/prepararPedido.php?id=$id' class='btn btn-success'>Pronto!</a>";
                $botaoWarning = "<a href='#' class='btn btn-warning'>Preparando...</a>";
            }else{
                die();
            }
            if(!isset($botaoWarning)){
                $botaoWarning = "";
            }
            echo "<div class='card bg-secondary text-white' style='width: 18rem;'>
                    $botaoWarning
                    <div class='card-body'>
                        <h5 class='card-title'>$sabor</h5>
                        <p class='card-text'>Pedido Nº: $id</p>
                        <p class='card-text'>Mesa/Cliente: $cliente</p>
                        <p class='card-text'>Tamanho: $tamanho</p>
                        <p class='card-text'>Hora do Pedido: $horaPedido</p>
                        $botao
                    </div>
                </div>";

            $c = 1; //se ele entrar no while então ele valerá 1
        }

        if($c == 0){//se ele valer 0 é pq ele não entrou no while, logo, não encontrou nada. VALEU KAWASSAKI-SANNNNN!
          echo "Nenhum pedido pendente";
        }


        ?>
  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>

