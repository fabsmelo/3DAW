<?php

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
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

      $sql = "Insert into `alunos` (`id`,`nome`, `email`, `cpf`, `matricula`, `uf`, `cidade`) VALUES (null, '$nome', '$email', '$cpf', '$mat', '$uf','$cidade')";

      if ($conn->query($sql) == TRUE) {
          echo json_encode("Aluno $nome Inserido com Sucesso");
      } else {
          echo json_encode("insert error: ");
      }
      //$result = $conn->query($sql);


  }

?>
