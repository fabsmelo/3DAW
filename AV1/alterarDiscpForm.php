<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Alterar disciplina</title>

  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <a class="navbar-brand" href="index.html">Menu principal</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse">

        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="formDisciplina.html">Criar Disciplina </a>
          </li>

          <li class="nav-item active">
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

    <div class="mx-auto" style="width: 600px;">

      <h1 style="margin: 60px 0px; ">Criar Disciplina</h1>

      <form class="form-row" method="POST" action="" style="margin-bottom: 85px;">

          <div class="col-sm-6" style="margin-bottom: 40px;">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome da disciplina ">
          </div>

          <div class="col-sm-6" style="margin-bottom: 40px;">
            <label for="preReq">Pré requisito</label>
            <input type="number" class="form-control" id="preReq" name="preReq"  placeholder="Insira o ID do pre requisito">
          </div>

          <div class="col-sm-6" style="margin-bottom: 40px;">
            <label for="periodo">Periodo</label>
            <input type="number" class="form-control" id="periodo" name="periodo"  placeholder="Insira o periodo">
          </div>

          <div class="col-sm-6" style="margin-bottom: 40px;">
            <label for="creditos">Creditos</label>
            <input type="number" class="form-control" id="creditos" name="creditos" placeholder="Insira a quantidade de creditos">
          </div>

          <div class="form-group col-md-12">
              <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
          </div>

      </form>

    </div>

  </body>

</html>

<?php
    if(isset($_POST["enviar"])){

      $servidor = "localhost";
      $usuario = "root";
      $senha = "";
      $nomeBanco = "av1daw";

      $id = $_GET['idAux'];
      $nome = $_POST['nome'];
      $periodo = $_POST['periodo'];
      $idPreReq = $_POST['preReq'];
      $creditos = $_POST['creditos'];

      $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

      if ($conn->connect_error) {

        die("Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error());

      }

      //Passar o comando sql para alterar a tabela
      $alter = "UPDATE disciplina SET nome = '$nome', periodo = '$periodo', idPreReq = '$idPreReq', creditos = '$creditos' WHERE id = '$id'";

      if ($conn->query($alter) === TRUE) {

        echo "<script>alert('Disciplina alterada com sucesso'); location= 'alterarDisciplina.html';</script>";

      } else {

        die("Erro!");

      }

    }

?>
