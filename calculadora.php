
<?php

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$op = $_POST['operacao'];

  function soma($num1, $num2){

      return $num1 + $num2;

  }

  function sub($num1, $num2){

    return $num1 - $num2;

  }

  function mult($num1, $num2){

    return $num1*$num2;

  }

  function div($num1, $num2){

    return $num1/$num2;

  }

  function potencia($num1, $num2){

    return pow($num1,$num2);

  }

  function raiz($num1){

    return sqrt($num1);

  }

  function sobx($num1){

    return 1/$num1;

  }

  function porcentagem($num1, $num2){

    $resultado = $num1/100*$num2;
    return $resultado;

  }

  if($op == "soma"){
    $resultado = soma($num1, $num2);
    echo "<script>alert('O resultado da soma é: $resultado'); location= './home.php';</script>";

  } else if($op == "subtracao"){
    $resultado = sub($num1, $num2);
    echo "<script>alert('O resultado da subtração é: $resultado'); location= './home.php';</script>";

  } else if($op == "multiplicacao"){
    $resultado = mult($num1, $num2);
    echo "<script>alert('O resultado da multiplicação é: $resultado'); location= './home.php';</script>";

  } else if($op == "divisao"){
    if($num2 != 0){
      $resultado = div($num1, $num2);
      echo "<script>alert('O resultado da divisão é: $resultado'); location= './home.php';</script>";

    } else {
      echo "<script>alert('Não é possível realizar divisão por 0'); location= './home.php';</script>";

    }

  }  else if($op == "exponenciacao"){
    $resultado = potencia($num1, $num2);
    echo "<script>alert('O resultado da potencia é: $resultado'); location= './home.php';</script>";

  }  else if($op == "raizQ"){
    $resultado = raiz($num1);
    echo "<script>alert('O resultado da raiz quadrada é: $resultado'); location= './home.php';</script>";
  }  else if($op == "sobx"){
    $resultado = sobx($num1);
    echo "<script>alert('O resultado de 1/$num1 é: $resultado'); location= './home.php';</script>";

  } else if($op == "porcentagem"){
    $resultado = porcentagem($num1, $num2);
    echo "<script>alert('$num2% de $num1 é: $resultado'); location= './home.php';</script>";

  }

?>
