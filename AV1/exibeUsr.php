<?php

//Criar conexão com o banco
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "av1daw";

  $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

  if ($conn->connect_error) {
    die("Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error());
  }

  //Passar o comando sql para ler a tabela
  $select = "SELECT * from usuario";

  $result = $conn->query($select);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Lista de usuários</title>

  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 60px;">

      <a class="navbar-brand" href="index.html">Menu principal</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="formDisciplina.html">Criar Disciplina </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="alterarDisciplina.html">Alterar Disciplina</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="listarTodasDisciplinas.php">Listar todas as Disciplinas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="listarUmaDisciplina.html">Listar uma Disciplina</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="apagarDisciplina.html">Remover Disciplina</a>
          </li>

        </ul>

      </div>

    </nav>

    <div class="col-sm-6 offset-3">

      <table class='table table-bordered table-striped'>

        <thead class="thead-dark">

          <tr>
            <th> Nome </th>
            <th> Email </th>
            <th> Senha </th>
            <th> Tipo </th>
            <th> Perfil </th>
          </tr>

        </thead>

        <?php

        if ($result->num_rows > 0){
          // Exibe o resultado da busca
          while($linha = $result->fetch_assoc()) {

            echo "<tr> <td>" . $linha["nome"] . "</td>" .
            "<td>" . $linha["email"] . "</td>" .
            "<td>" . $linha["senha"] . "</td>" .
            "<td>" . $linha["tipo"] . "</td>" .
            "<td>" . $linha["perfil"] . "</td>" .
            "</tr>";

          }

        } else {

          echo "<script>alert('Banco Vazio'); location= 'index.html';</script>";

        }

        ?>
      </table>

    </div>

  </body>

</html>
