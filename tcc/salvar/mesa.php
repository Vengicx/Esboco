<?php
	if($_POST){
	
		if(isset($_POST["mesa"])){
			$mesa = trim ($_POST["mesa"]);
		}

		if(isset($_POST["tamanho"])){
			$tamanho = trim ($_POST["tamanho"]);
		}

		if(isset($_POST["sabor"])){
			$sabor = trim ($_POST["sabor"]);
		}

		$horaPedido = date("h:i:s");

		require "./conecta.php";

		$pdo->beginTransaction();

		$sql = "INSERT INTO pedido values (NULL, ?, ?, ?, '1', NOW())";//NOW() Serve para inserir a hora atual.
		$consulta = $pdo->prepare($sql);
		$consulta->bindParam(1, $mesa);
		$consulta->bindParam(2, $sabor);
		$consulta->bindParam(3, $tamanho);

		if($consulta->execute()){
			echo "<script>alert('Pedido Realizado com sucesso');history.back();</script>";
			$pdo->commit();
		}else{
			echo "<script>alert('Erro ao realizar pedido');history.back();</script>";
			$pdo->rollBack();
		}

	}else{
		header("Location: ./index.php");
	}

?>