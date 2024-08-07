<?php


function createRandom($quantidade)
{
  $arraySort = [];
  for ($i = 0; $i <= $quantidade; $i++) {

    $arraySort[$i] = $i;
  }

  shuffle($arraySort);
  return $arraySort;
}

function bubbleSort(array $ArraySort): array
{
  $tamanho = count($ArraySort);
  for ($i = 0; $i < $tamanho - 1; $i++) {
    for ($j = 0; $j < ($tamanho - $i - 1); $j++) {
      if ($ArraySort[$j] > $ArraySort[$j + 1]) {
        // Troca os elementos
        $temp = $ArraySort[$j];
        $ArraySort[$j] = $ArraySort[$j + 1];
        $ArraySort[$j + 1] = $temp;
      }
    }
  }
  //print_r($ArraySort);
  return $ArraySort;
}

function insertionSort(array $array): array
{
  $tamanho = count($array);

  // Começa com o segundo elemento, já que o primeiro elemento é considerado ordenado
  for ($i = 1; $i < $tamanho; $i++) {
    // Guarda o valor do elemento atual
    $valorAtual = $array[$i];

    // Inicializa a posição para comparação
    $j = $i - 1;

    /**
     * Move os elementos da parte ordenada que são maiores que o valorAtual para a direita
     * faz o decremento para continuar o laço e fazer nova interação, digamos um array [5, 3, 8, 4, 2]
     * na interações ele vai movimentar o 5 pro lugar do 3 e depois o 8 com o 4, porem quando ele movimentar o 8 e 4, ele vai
     * decrementar e vai rodar o laço novamente para verificar se 5 é maior que o 4 e assim sucessivamente 
     */

    while ($j >= 0 && $array[$j] > $valorAtual) {
      $array[$j + 1] = $array[$j];
      $j--;
    }

    // Insere o valorAtual na posição correta
    $array[$j + 1] = $valorAtual;
  }
  //print_r($array);
  return $array;
}

function selectionSort(array $array): array
{
  $tamanho = count($array);
  for ($i = 0; $i < $tamanho - 1; $i++) {
    $index = $i;
    for ($j = $i + 1; $j < $tamanho; $j++) {
      if ($array[$j] < $array[$index]) {
        $index = $j;
      }
    }

    // aqui ele armazena o valor em uma variavel auxiliar
    $temp = $array[$index];

    //aqui ele pega o valor da variavel a direita e joga pra esquerda
    $array[$index] = $array[$i];

    // aqui ele pega o valor que estava na esquerda (q na variavel auxiliar) e joga pra direita
    $array[$i] = $temp;
  }
  //print_r($array);
  return $array;
}


function quickSort(array $array): array
{
  if (count($array) < 2) {
    return $array;
  }
  $esquerda = [];
  $direita = [];
  $sentinela = $array[0];
  for ($i = 1; $i < count($array); $i++) {
    $array[$i] < $sentinela ?  ($esquerda[] = $array[$i]) : ($direita[] = $array[$i]);
  }
  return array_merge(quickSort($esquerda), [$sentinela], quickSort($direita));
}

function tempoExecucao(callable $function, array $array): array
{
  // Medindo o tempo antes da execução
  $startTime = microtime(true);

  // Executando a função de ordenação
  $result = call_user_func($function, $array);

  // Medindo o tempo após a execução
  $endTime = microtime(true);

  // Calculando o tempo gasto
  $executionTime = $endTime - $startTime;

  // Convertendo o tempo para minutos e segundos
  $minutes = floor($executionTime / 60);
  $seconds = $executionTime - $minutes * 60;

  // Exibindo o tempo gasto
  echo "Tempo gasto: " . $minutes . " minutos e " . number_format($seconds, 2) . " segundos\n";

  return $result;
}


function sortArray(array $array)
{
  sort($array);
  return $array;
}



$ArraySort = createRandom(1000000);

$ordenado = tempoExecucao('quickSort', $ArraySort);














//print_r($ordenado);
//tempo gasto no bubbleSort pra 100.000 registro = 7 minutos e 59.22 segundos
//tempo gasto no insertionSort pra 100.000 registro = 2 minutos e 30.67 segundos
//tempo gasto no selectionSort pra 100.000 registro = 2 minutos e 40.59 segundos
//tempo gasto no quickSort pra 100.000 registro = 0.14 ms
//tempo gasto no quickSort pra 1.000.000 registro = 1.88 segundos
