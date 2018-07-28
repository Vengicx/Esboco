<?php
	if(isset($_POST["nomeProduto"])){
		$nomeProduto = trim ($_POST["nomeProduto"]);
	}

	if(isset($_POST["quantidade"])){
		$quantidade = trim ($_POST["quantidade"]);
	}

	if(isset($_POST["precoCompra"])){
		$precoCompra = trim ($_POST["precoCompra"]);
	}

	if(isset($_POST["precoVenda"])){
		$precoVenda = trim ($_POST["precoVenda"]);
	}

	if(isset($_POST["tipoProduto"])){
		$tipoProduto = trim ($_POST["tipoProduto"]);
	}

	require "./conecta.php";

	$pdo->beginTransaction();

	$sql = "INSERT INTO materiaprima (id, nome, quantidade, precoCompra, precoVenda, tipoProduto) VALUES (NULL, ?, ?, ?, ?, ?)";
	$consulta = $pdo->prepare($sql);
	$consulta->bindParam(1, $nomeProduto);
	$consulta->bindParam(2, $quantidade);
	$consulta->bindParam(3, $precoCompra);
	$consulta->bindParam(4, $precoVenda);
	$consulta->bindParam(5, $tipoProduto);

	if($consulta->execute()){
		$pdo->commit();
		echo "<script>alert('Produto cadastrado com sucesso!');history.back();</script>";
		
	}else{
		$pdo->rollBack();
		echo "<script>alert('Erro ao cadastrar produto');history.back();</script>";
		
	}


?>