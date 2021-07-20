<?php

  $act = $_GET['act'];

  switch($act){

    case "tipo":
      listaTipo();
      break;

    case "categ":
      listaCategoria();
      break;

    case "insert":
      insereProd();
      break;

    case "alter":
      alterarProd();
      break;

    case "alterar":
      alterar();
      break;

    case "list":
      listarProdutos();
      break;

    case "listOne":
      listarUmProd();
      break;

    case "remove":
      remove();
      break;
  }

  function insereProd(){
    include 'connection.php';

    $codBarras = $_GET['num'];
    $nome = $_GET['nome'];
    $fabricante = $_GET['fabricante'];
    $preco = (float)$_GET['preco'];
    $estoque = $_GET['estoque'];
    $categoria = $_GET['categoria'];
    $tipo = $_GET['tipo'];
    $peso = $_GET['peso'];
    $data = $_GET['data'];
    $descricao = $_GET['descricao'];
    $urlImg = "imagens/".$codBarras.".jpg";


    $insert = "INSERT INTO produtos (cod_barras, nome, fabricante, preco, qtd, tipo, categoria, peso, data, descricao, imagem, status)
    VALUES ('$codBarras', '$nome', '$fabricante', $preco, $estoque, '$tipo', '$categoria', $peso, '$data', '$descricao', '$urlImg', 'ATIVO')";

    if ($conn->query($insert) === TRUE) {
      echo json_encode("Cadastro realizado com sucesso");
    } else {
      echo json_encode("erro!");
    }

    $conn->close();

  }

  function alterarProd(){
    include 'connection.php';

      $codBarras = $_GET['num'];
      $nome = $_GET['nome'];
      $fabricante = $_GET['fabricante'];
      $preco = (float)$_GET['preco'];
      $estoque = $_GET['estoque'];
      $categoria = $_GET['categoria'];
      $tipo = $_GET['tipo'];
      $peso = $_GET['peso'];
      $data = $_GET['data'];
      $descricao = $_GET['descricao'];
      $urlImg = "imagens/".$codBarras.".jpg";

      $alter = "UPDATE produtos SET cod_barras = '$codBarras', nome = '$nome', fabricante = '$fabricante',
      preco = $preco, qtd = $estoque, tipo ='$tipo', categoria = '$categoria', peso = $peso, data = '$data',
      descricao = '$descricao', imagem = '$urlImg', status = 'ATIVO' WHERE cod_barras = '$codBarras'";

      if ($conn->query($alter) == TRUE) {
          echo json_encode("Produto $nome alterado com Sucesso");
      } else {
          echo json_encode("insert error: ");
      }
  }

  function alterar(){
    include 'connection.php';
    $codBarras = $_GET['num'];

    $select = "SELECT * FROM produtos WHERE cod_barras = '$codBarras'";
    $result = $conn->query($select);

    if ($result->num_rows > 0){

      while($linha = $result->fetch_assoc()){

        $produtos = array(
          'cod_barras' => utf8_encode($linha['cod_barras']),
          'nome' => utf8_encode($linha['nome']),
          'fabricante' => utf8_encode($linha['fabricante']),
          'preco' => (float)($linha['preco']),
          'qtd' => $linha['qtd'],
          'tipo' => utf8_encode($linha['tipo']),
          'categoria' => utf8_encode($linha['categoria']),
          'peso' => $linha['peso'],
          'data' => $linha['data'],
          'descricao' => utf8_encode($linha['descricao']),
          'imagem' => utf8_encode($linha['imagem']),
          'status' => utf8_encode($linha['status'])
        );

      }


      echo json_encode($produtos);

    } else {

      echo ("produto não encontrado");

    }

  }

  function listaTipo(){
    include 'connection.php';
    $select = "SELECT * FROM tipos";
    $result = $conn->query($select);
    $nomeTipo = array();

    if ($result->num_rows > 0){

      while ($linha = $result->fetch_assoc()) {
        $nomeTipo[] = $linha['tipo'];
      }

      echo json_encode($nomeTipo);

    } else {
        echo ("banco vazio");
    }

  }

  function listaCategoria(){
    include 'connection.php';
    $select = "SELECT * FROM categorias";
    $result = $conn->query($select);
    $nomeCategoria = array();

    if ($result->num_rows > 0){

      while ($linha = $result->fetch_assoc()) {
        $nomeCategoria[] = $linha['categoria'];
      }

      echo json_encode($nomeCategoria);

    } else {
      echo ("banco vazio");
    }

  }

  function listarProdutos(){
    include 'connection.php';
    $select = "SELECT * FROM produtos";
    $result = $conn->query($select);
    $arrayProd = array();

    while ($linha = $result->fetch_assoc()) {

      $produtos = array(
        'cod_barras' => utf8_encode($linha['cod_barras']),
        'nome' => utf8_encode($linha['nome']),
        'fabricante' => utf8_encode($linha['fabricante']),
        'preco' => (float)($linha['preco']),
        'qtd' => $linha['qtd'],
        'tipo' => utf8_encode($linha['tipo']),
        'categoria' => utf8_encode($linha['categoria']),
        'peso' => ($linha['peso']),
        'data' => ($linha['data']),
        'descricao' => utf8_encode($linha['descricao']),
        'imagem' => utf8_encode($linha['imagem']),
        'status' => utf8_encode($linha['status'])
      );
      $arrayProd['prod'][] = $produtos;

    }

    echo json_encode($arrayProd);
  }

  function listarUmProd(){
    include 'connection.php';
    $codBarras = $_GET['num'];

    $select = "SELECT * FROM produtos WHERE cod_barras = '$codBarras'";
    $result = $conn->query($select);

    if ($result->num_rows > 0){

      while($linha = $result->fetch_assoc()){

        $produto = array(
          'cod_barras' => utf8_encode($linha['cod_barras']),
          'nome' => utf8_encode($linha['nome']),
          'fabricante' => utf8_encode($linha['fabricante']),
          'preco' => (float)($linha['preco']),
          'qtd' => $linha['qtd'],
          'tipo' => utf8_encode($linha['tipo']),
          'categoria' => utf8_encode($linha['categoria']),
          'peso' => ($linha['peso']),
          'data' => ($linha['data']),
          'descricao' => utf8_encode($linha['descricao']),
          'imagem' => utf8_encode($linha['imagem']),
          'status' => utf8_encode($linha['status'])
        );

      }
      echo json_encode($produto);
    }
    else {
      echo json_encode("Produto não encontrado!");
    }
  }

  function remove(){
    include 'connection.php';
    $codBarras = $_GET['num'];

    $select = "SELECT * FROM produtos WHERE cod_barras = '$codBarras'";
    $result = $conn->query($select);
    if ($result->num_rows > 0){

      $alter = "UPDATE produtos SET status = 'INATIVO' WHERE cod_barras = '$codBarras'";
      if ($conn->query($alter) == TRUE) {

          echo json_encode("Produto removido com Sucesso");

      } else {

          echo json_encode("insert error: ");

      }
    } else {

      echo json_encode("Produto não encontrado");

    }
  }


?>
