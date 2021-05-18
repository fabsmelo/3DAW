<?php
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "av1daw";

  $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

  if ($conn->connect_error) {
    die("Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error());
  }

  $arq = $_FILES['usr']['tmp_name'];
  $valor = file($arq);
  $result = array();

  foreach ($valor as $linha) {

    $result = explode("|", $linha);
    $nome = $result[0];
    $email = $result[1];
    $senha = $result[2];
    $tipo = $result [3];
    $perfil = $result[4];

    $insert = "INSERT INTO usuario (nome, email, senha, tipo, perfil) VALUES ('$nome', '$email', '$senha', '$tipo', '$perfil')";
    $conn->query($insert);

  }

  if ($conn->query($insert) === TRUE) {
    echo "<script>alert('Usuario cadastrado com sucesso'); location= 'exibeUsr.php';</script>";
  } else {
    echo "erro!";
  }

?>
