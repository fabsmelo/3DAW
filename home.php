<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Calculadora</title>
  </head>
  <body>
    <div div class="mx-auto" style="width: 600px;">

      <h1 style="margin-bottom: 50px;">Calculadora</h1>

      <form class="form-row" action="calculadora.php" method="POST" style="margin-bottom: 85px;">

          <div class="form-group col-md-6">
            <label for="num1">Primeiro valor</label>
            <input type="text" class="form-control num1" id="num1" name="num1" placeholder="Insira um numero">
          </div>

          <div class="form-group col-md-6" style="margin-bottom: 40px;">
            <label for="num2">Segundo valor</label>
            <input type="text" class="form-control num2" id="num2" name="num2" placeholder="Insira um numero">
          </div>

          <div class="form-group col-md-12" style="margin-bottom: 30px;">
            <label for="operacao">Selecione a operação que deseja executar</label>
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

  </body>
</html>
