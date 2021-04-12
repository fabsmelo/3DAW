<<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Calculadora</title>
  </head>
  <body>
    <h1>Calculadora</h1>

    <div class="container-fluid">

      <form class="form-row" action="" method="GET">

          <div class="form-group col-md-6">
            <label for="num1">Primeiro valor</label>
            <input type="text" class="form-control num1" id="num1" name="num1" placeholder="Insira um numero">
          </div>

          <div class="form-group col-md-6">
            <label for="num2">Segundo valor</label>
            <input type="text" class="form-control num2" id="num2" name="num2" placeholder="Insira um numero">
          </div>

          <div class="form-group col-md-4">
            <label for="operacao">Qual operação deseja executar</label>
            <select id="operacao" class="form-control" name="operacao">
              <option selected>Escolher...</option>
              <option value="soma">Soma</option>
              <option value="subtracao">Subtração</option>
              <option value="multiplicacao">Multiplicação</option>
              <option value="divisao">Divisão</option>
            </select>
          </div>

          <div class="form-group col-md-12">
              <button class="btn btn-primary" type="submit" name="enviar">Calcular</button>
          </div>

      </form>

    </div>

    <?php

        include "calculadora.php";
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $op = $_GET['operacao'];

        if($op == "soma"){
          echo "O resultado da soma é: ".soma($num1, $num2);

        } else if($op == "subtracao"){
          echo "O resultado da subtração é: ".sub($num1, $num2);

        } else if($op == "multiplicacao"){
          echo "O resultado da multiplicação é: ".mult($num1, $num2);

        } else if($op == "divisao"){
          if($num2 != 0){
            echo "O resultado da divisão é: ".div($num1, $num2);

          } else {
            echo "Não é possível realizar divisão por 0";

          }

        }

    ?>

  </body>
</html>
