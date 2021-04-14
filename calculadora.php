
<?php

  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $op = $_POST['operacao'];

  if($op == "soma"){
    echo "O resultado da soma é: ",$num1+$num2;

  } else if($op == "subtracao"){
    echo "O resultado da subtração é: ",$num1-$num2;

  } else if($op == "multiplicacao"){
    echo "O resultado da multiplicação é: ",$num1*$num2;

  } else if($op == "divisao"){
    if($num2 != 0){
      echo "O resultado da divisão é: ",$num1/$num2;

    } else {
      echo "Não é possível realizar divisão por 0";

    }

  } else {
    echo "Escolha uma operação";
  }

?>
