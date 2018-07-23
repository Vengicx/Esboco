<?php
	include "../conecta.php";

	$id = $_GET["id"];
	$consulta = $pdo->prepare("SELECT * FROM pedido where id = ?");
	$consulta->bindParam(1, $id);
	$consulta->execute();
	$dados = $consulta->fetch(PDO::FETCH_OBJ);
	
	if($dados->andamento == '2'){
		$consulta = $pdo->prepare("UPDATE pedido set andamento = '3' where id = ?");
		$consulta->bindParam(1, $id);

		if($consulta->execute()){
			echo "<script>alert('Pedido atualizado para Pronto');</script>";
			header("Location: ../index.php?fd=.&pg=cozinha");
			

		}else{
			echo "<script>alert('Erro ao finalizar pedido');</script>";
			header("Location: ../index.php?fd=.&pg=cozinha");
		}
	}else{
		$consulta = $pdo->prepare("UPDATE pedido set andamento = '2' where id = ?");
		$consulta->bindParam(1, $id);

		if($consulta->execute()){
			echo "<script>alert('Pedido atualizado para Preparando');</script>";
			header("Location: ../index.php?fd=.&pg=cozinha");

		}else{
			echo "<script>alert('Erro ao preparar pedido');</script>";
			header("Location: ../index.php?fd=.&pg=cozinha");
		}
	}
?>