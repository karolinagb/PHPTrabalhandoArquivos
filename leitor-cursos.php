<?php

//fopen = abrir arquivo
    //parâmetros
    //nome arquivo, o que fazer com ele (r = read/ler)
    //Retorna como um ponteiro para esse arquivo
// $arquivo = fopen('lista-cursos.txt', 'r');

//nao chegar no fim do arquivo
//feof = file - end of file = 
// while(!feof($arquivo)){
//     //ler uma linha
//     //fgets = pega uma string até final da linha de determinado arquivo. Ela também posiciona o curso no final da linha lida
//     //quando a função lê uma quebra de linha ela para
//         //Parâmetros
//         //arquivo
//         //Número = caso queira ler uma determinada quantidade de caracteres
//     $curso = fgets($arquivo);
//     echo $curso . PHP_EOL;
// }

//filesize() = traz o tamanho do arquivo
    //Parâmetros
    //Nome do arquivo
// $tamanhoDoArquivo = filesize('lista-cursos.txt');

//Posso pegar o arquivo todo ao invés de linha a linha
    //fread = lê o arquivo como um todo
        //Parâmetros
        //arquivos
        //quantidade de caracteres (na verdade é bytes) que quero ler
// $cursos = fread($arquivo, $tamanhoDoArquivo);
//Não interessante ler assim arquivos grandes
//O php pode ler até 128 mega
//Melhor ler linha a linha

// echo $cursos;

//é sempre uma boa prática fechar o arquivo depois
//o php faz isso sozinho, mas se acontecer algum problema o arquivo pode ficar aberto
//isso impediria de ser manipulado por outro programas e ainda ocupa memória
// fclose($arquivo);

//Forma mais simples de ler um arquivo
//file_get_contents = abre o arquivo, busca todo o conteúdo desse arquivo para retornar como string e fecha arquivo
echo file_get_contents('lista-cursos.txt') . "\n";

echo "\n";

//Lê um arquivo e transforma em um array
var_dump(file('lista-cursos.txt'));