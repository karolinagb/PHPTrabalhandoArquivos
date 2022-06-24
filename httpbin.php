<?php

//Criando o contexto para passar para a requisição depois
$contexto = stream_context_create([
    //Para qual wrapper esse contexto vai valer:
    'http' => [
        'method' => 'POST',
    'header' => "X-From: PHP\r\nContent-type: text/plain",
        'content' => 'Teste do corpo da requisção'
    ]
]);

//Passando dados para um requisição
echo file_get_contents('http://httpbin.org/post', false, $contexto);