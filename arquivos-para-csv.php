<?php

$meusCursos = file('lista-cursos.txt');

//file() = pega cada linha como indice do array
$outrosCursos = file('cursos-php.txt');

//csv = comma separator value = valores separados por virgula
$arquivoCsv = fopen('cursos.csv', 'w');

foreach ($meusCursos as  $curso) {
    $linha = [trim($curso), 'Sim'];

    //Podemos fazer assim usando o implode
    // fwrite($arquivoCsv, implode(',', $linha));
    
    //Ou usar algo mais fácil pra escrever no csv
    //fputcsv() = vai adicionar um dado ja formatado como csv
    fputcsv($arquivoCsv, $linha, ';');

    //Para ler os dados de um csv usamos:
    //fgetcsv() = Le uma linha, faz a separação e traz como um array
}

foreach ($outrosCursos as  $curso) {
    $linha = [trim($curso), 'Não'];

    // fwrite($arquivoCsv, implode(',', $linha));

    fputcsv($arquivoCsv, $linha, ';');
}

fclose($arquivoCsv);