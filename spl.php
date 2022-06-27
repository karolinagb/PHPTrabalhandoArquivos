<?php

//spl = Standard PHP Library

//Não preciso informar o modo de leitura r pois o de leitura já é o padrão
$arquivoCursos = new SplFileObject('cursos.csv', 'r');

//Enquanto não chegar no final do arquivo eu vou ler uma linha em csv
while(!$arquivoCursos->eof()){
    $linha = $arquivoCursos->fgetcsv(';');

    //tira da tabela que o excel entende e lê para UTF8
    echo utf8_encode($linha[0]) . "\t" . $linha[1] . PHP_EOL;
}

//TimeStamp de quando esse arquivo foi criado
// echo $arquivoCursos->getCTime();

$date = new DateTime();

$date->setTimestamp($arquivoCursos->getCTime());

echo $date->format('d/m/Y');