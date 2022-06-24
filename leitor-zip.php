<?php

//contextos para o wrappers do php

//Adicionando contexto para ler zio com senha
$contexto = stream_context_create(['zip' => [
    'password' => '123456'
]]);

//zip:// é o wrapper ou protocolo que vamos utilizar para leitura desse arquivo
echo file_get_contents('zip://arquivos.zip#lista-cursos.txt', false, $contexto);

//Dá para usar contexto em qualquer uma das funções de stream como a fopen()