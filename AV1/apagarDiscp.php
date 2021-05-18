<?php
//Criar conexão com o banco
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "av1daw";

  $id = $_GET['idAux'];

  $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

  if ($conn->connect_error) {

    die("Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error());

  }

  //Passar o comando sql para procurar o id na tabela
  $select = "SELECT * from disciplina WHERE id='$id'";

  $result = $conn->query($select);

  if ($result->num_rows > 0){

    //deletar o dado da tabela
    $delete = "DELETE FROM disciplina WHERE id='$id'";
    if ($conn->query($delete) === TRUE) {

      echo "<script>alert('Disciplina removida com sucesso!'); location= 'listarTodasDisciplinas.php';</script>";

    } else {

      die("Erro!");

    }

  } else {

    echo "<script>alert('ID inválido!'); location= 'listarTodasDisciplinas.php';</script>";

  }
?>
