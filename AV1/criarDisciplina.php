<?php

//Criar conexão com o banco
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "av1daw";

  $id = $_POST['num'];
  $nome = $_POST['nome'];
  $periodo = $_POST['periodo'];
  $idPreReq = $_POST['preReq'];
  $creditos = $_POST['creditos'];

  $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

  if ($conn->connect_error) {
    die("Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error());
  }

  //Passar o comando sql para inserir a tabela
  $insert = "INSERT INTO disciplina (id, nome, periodo, idPreReq, creditos) VALUES ('$id', '$nome', '$periodo', '$idPreReq', '$creditos')";

  if ($conn->query($insert) === TRUE) {
    echo "<script>alert('Cadastro realizado com sucesso'); location= 'criarDiscpForm.html';</script>";
  } else {
    echo "erro!";
  }

  $conn->close();

?>
