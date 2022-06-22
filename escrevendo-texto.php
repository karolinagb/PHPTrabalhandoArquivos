<?php

//Posso criar um novo arquivo com o fopen
//w = escrita
$arquivo = fopen('cursos-php.txt', 'w');

$curso = "PHP Composer: Dependências, Autoload e Publicação";

//escrever em um arquivo
//fwrite() = escreve em um arquivo
    //parÂmetros
    //arquivo, string a ser escrita, limite de quantos caracteres quero escrever (opcional)
fwrite($arquivo, $curso);

fclose($arquivo);