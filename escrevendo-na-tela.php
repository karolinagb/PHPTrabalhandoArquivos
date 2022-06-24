<?php

echo "Olá mundo com echo" . PHP_EOL;
print "Olá mundo com print". PHP_EOL;

//Escrevendo na tela:
//stout = saida normal
//stderr = saida de erro - bom para log
$tela = fopen('php://stdout','w');

fwrite($tela, "Olá mundo com fwrite" . PHP_EOL);

fwrite(STDOUT, "Olá mundo com constante STDOUT" . PHP_EOL);

$cursos = fopen('zip://arquivos.zip#cursos-php.txt', 'r');

//mandar de um stream para outro (no caso para a tela)
stream_copy_to_stream($cursos, STDOUT);