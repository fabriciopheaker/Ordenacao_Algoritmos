# Algoritmos de Ordenação em PHP
Este repositório contém a implementação de vários algoritmos de ordenação utilizando PHP, com o objetivo de testar e comparar sua eficiência. Os testes foram realizados em conjuntos de dados variando de 100.000 a 1 milhão de registros.


# Funcionamento 
Primeiramente, criei uma função que gera um array com uma quantidade especificada de números aleatórios e desordenados. Por exemplo

$ArraySort = createRandom(1000);

No exemplo acima, criei um array com 1000 números desordenados.

Para medir o desempenho dos algoritmos de ordenação, desenvolvi uma função que cronometra o tempo de execução. Esta função inicia a contagem de tempo quando a ordenação começa e a finaliza quando a ordenação é concluída. Exemplo:
$ordenado = tempoExecucao('quickSort', $ArraySort);

No primeiro parâmetro, você especifica o método de ordenação a ser utilizado, e no segundo, o array que será ordenado. O tempo gasto na operação será impresso.

# Os metodos de ordernação 

##### bubbleSort
##### insertionSort
##### selectionSort
##### quickSort


# Comparação de Desempenho
Para comparar o desempenho dos algoritmos, criei um método de ordenação adicional que utiliza a função nativa sort do PHP. O método sortArray, que utiliza sort, apresentou o melhor desempenho ao ordenar 1.000.000 de registros em 0,323 ms. Embora eficiente, o quickSort não atingiu a mesma eficiência.


# Resultados dos Algoritmos

### Testes com 100.000 registros:
##### bubbleSort: 7 minutos e 59,22 segundos
##### insertionSort: 2 minutos e 30,67 segundos
##### selectionSort: 2 minutos e 40,59 segundos
##### quickSort: 0,14 ms
##### sortArray (usando sort): 0,026 ms
 
### Testes com 1.000.000 registros:
##### quickSort: 1,88 segundos
##### sortArray (usando sort): 0,323 ms

