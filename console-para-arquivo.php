<?php

//stdin - stand input - dados que vem do teclado - sempre é modo leitura
// $teclado = fopen('php://stdin', 'r');

//Lendo uma linha do teclado
//fgets = pega todos os caracteres até uma quebra de linha
    //Para não ter uma quebra de linha no final, basta adicionar o trim
// $novoCurso = trim(fgets($teclado));

// file_put_contents('cursos-php.txt', PHP_EOL . $novoCurso, FILE_APPEND);

//Ao invés de fazer dessa forma também poderia usar diretamente a constante do php: STDIN

$novoCurso = trim(fgets(STDIN));

file_put_contents('cursos-php.txt', PHP_EOL . $novoCurso, FILE_APPEND);

//Esse recursos que começam com php:// não precisamos fechar pois o php já faz isso automaticamente