<?php

  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "ex20";

  $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

  if ($conn->connect_error) {

    die("Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error());

  }

  $estado = $_GET["estado"];

  $select = "SELECT * FROM estado WHERE uf = '$estado' ";
  $result = $conn->query($select);
  $linha = $result->fetch_assoc();
  $idEstado = $linha["id"];

  $selectNome = "SELECT * FROM cidade WHERE estado = $idEstado ";
  $resultNome = $conn->query($selectNome);
  $nomeCidade = array();

  while ($linhaNome = $resultNome->fetch_assoc()) {
    $nomeCidade[] = $linhaNome['nome'];
  }

  echo json_encode($nomeCidade);


?>
