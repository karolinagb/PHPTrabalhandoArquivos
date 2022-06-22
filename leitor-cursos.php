<?php

//fopen = abrir arquivo
    //parâmetros
    //nome arquivo, o que fazer com ele (r = read/ler)
    //Retorna como um ponteiro para esse arquivo
$arquivo = fopen('lista-cursos.txt', 'r');

//nao chegar no fim do arquivo
//feof = file - end of file = 
while(!feof($arquivo)){
    //ler uma linha
    //fgets = pega uma string até final da linha de determinado arquivo. Ela também posiciona o curso no final da linha lida
    //quando a função lê uma quebra de linha ela para
        //Parâmetros
        //arquivo
        //Número = caso queira ler uma determinada quantidade de caracteres
    $curso = fgets($arquivo);
    echo $curso . PHP_EOL;
}

//é sempre uma boa prática fechar o arquivo depois
//o php faz isso sozinho, mas se acontecer algum problema o arquivo pode ficar aberto
//isso impediria de ser manipulado por outro programas e ainda ocupa memória
fclose($arquivo);