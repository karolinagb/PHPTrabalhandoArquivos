<?php

$arquivoCursos = fopen('lista-cursos.txt', 'r');

//stream/file
//stream_filter_apprend = adiciona um filtro ao stream
    //string.toupper = coloca todos os caracteres com letra maiúscula
stream_filter_append($arquivoCursos, 'string.toupper');

echo fread($arquivoCursos, filesize('lista-cursos.txt'));