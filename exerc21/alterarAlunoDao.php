<?php

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $id = $_GET["id"];
      $nome = $_GET["nome"];
      $email = $_GET["email"];
      $cpf = $_GET["cpf"];
      $mat = $_GET["matricula"];
      $uf = $_GET["uf"];
      $cidade = $_GET["cidade"];

      $servidor = "localhost";
      $usuario = "root";
      $senha = "";
      $nomeBanco = "ex20";

      $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);

      if ($conn->connect_error) {

          die("Conexão com erro: " . $conn->connect_error);

      }

      $sql = "UPDATE alunos SET nome ='$nome', email = '$email', cpf = '$cpf', matricula = '$mat', uf = '$uf', cidade = '$cidade' WHERE id = '$id'";

      if ($conn->query($sql) == TRUE) {
          echo json_encode("Aluno $nome alterado com Sucesso");
      } else {
          echo json_encode("insert error: ");
      }

  }

?>
