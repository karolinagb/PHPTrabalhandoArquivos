<?php

require 'MeuFiltro.php';

$arquivoCursos = fopen('lista-cursos.txt', 'r');

//Registrando o filtroq que criei
stream_filter_register('alura.partes', MeuFiltro::class);

//stream/file
//stream_filter_apprend = adiciona um filtro ao stream
    //string.toupper = coloca todos os caracteres com letra maiúscula
    //alura.partes = adicionando nosso filtro
stream_filter_append($arquivoCursos, 'string.toupper', 'alura.partes');

echo fread($arquivoCursos, filesize('lista-cursos.txt'));