<?php

/*
 * For a starting value of $principle, at an annual interest rate of $rate percent, and over some $number of months,
 * write a program that will show a table showing the starting principle, appreciation, and new balance for each
 * month between now (month 0) and the final month.
 *
 * Executar script:
 * docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp php:8.0-cli php solucao_juros.php
 *
 * docker build -t my-php-app . && docker run -it --rm --name my-running-app my-php-app
 */

// entradas
$principle = 1000.00;
$rate = 7.25;
$number = 36;

// processamento
$taxaMensal = bcdiv($rate, 12, 8);
$taxaMensalPercentual = bcdiv($taxaMensal, 100, 8);
$balanco = $principle;

echo "Taxa mensal de $taxaMensal % ao mês.\n";

foreach (range(0, $number) as $mes) {
    $balancoAnterior = $balanco;

    if ($mes > 0) {
        // recalcula
        $balanco += (float) bcmul($balanco, $taxaMensalPercentual, 8);
    }

//    echo "Saldo inicial: $principle\n";
//    echo "Apreciação: " . ($balanco - $principle) . "\n";
//    echo "Novo balanço: $balanco\n";

    echo sprintf(
        "Mês%4d. %20.2f %20.2f",
        $mes,
        $balancoAnterior,
        $balanco,
    ) . PHP_EOL;
}