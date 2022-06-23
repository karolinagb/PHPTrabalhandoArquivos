<?php

//zip:// é o wrapper ou protocolo que vamos utilizar para leitura desse arquivo
echo file_get_contents('zip://arquivos.zip#lista-cursos.txt');