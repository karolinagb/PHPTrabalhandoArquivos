<?php

//Posso criar um novo arquivo com o fopen
//w = modo de abertura para escrita
    //abre o arquivo, ou caso não exista tenta criá-lo, e coloca o cursor no início do arquivo para começar a escrever
    //Por isso que quando executei o código 2 vezes ele não colocou uma string do lado da outra, mas sim sobrescreveu a anterior
$arquivo = fopen('cursos-php.txt', 'w');

$curso = "PHP Composer: Dependências, Autoload e Publicação";

//escrever em um arquivo
//fwrite() = escreve em um arquivo
    //parÂmetros
    //arquivo, string a ser escrita, limite de quantos caracteres quero escrever (opcional)
fwrite($arquivo, $curso);

fclose($arquivo);

//a = modo de abertura apende
    //Coloca o curso no final do arquivo para adicionar textos depois do que já existe
$arquivo = fopen('cursos-php.txt', 'a');

$curso = "\nPHP Composer: Curso 2";

fwrite($arquivo, $curso);

fclose($arquivo);

//Forma mais fácil de escrever no arquivo
file_put_contents('cursos-php.txt', $curso);

$curso = "\nTeste";
//3º parâmetro são flags = informações a mais
    //FILE_APPEND = ADICIONA no final
    //Adicionar mais flags:  flag | flag
file_put_contents('cursos-php.txt', $curso, FILE_APPEND);

