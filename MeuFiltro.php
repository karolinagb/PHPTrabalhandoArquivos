<?php

class MeuFiltro extends php_user_filter
{
    public $stream;

    //É executado sempre que for criada uma instancia de MeuFiltro
    public function onCreate() : bool
    {
        //Quando for criado esse filtro eu preciso criar um stream que vai ser enviado para esse dado de saída
        //Vamos criar um stream temporário que só manipula os dados em memória e depois ignora
        //temp = me fornece dados temporarios (ou espaço na memória) para que eu possa escrever, ler e depois isso vai ser ignorado
        $this->stream = fopen('php://temp', 'w+');

        //essa funcao precisa retornar true ou false(se deu algum erro)
        return $this->stream !== false;
    }

    //É executado sempre que MeuFiltro  não existe mais/deixa de ser executado
    // public function onClose(): void
    // {
        
    // }

    //in = recurso de entrada. É um recurso que contém buckets (como pequenos pedaços do nosso arquivo) que não têm
        //um tamanho pré-definido
        //Em um arquivo pequeno vai vir o arquivo inteiro
        //Um arquivo muito grande pode ser dividido
    //out
    //consumed = número de bytes consumidos do stream que está passando por esse filtro
    //closing = se o stream está sendo fechado ou não
    public function filter($in, $out, &$consumed, bool $closing) : int
    {
        //transformar o recurso de entrada em algo manipulável
        //Enquanto nesse recurso eu conseguir pegar um bucket dele

        //Conteúdo de saída
        $saida = '';

        while($bucket = stream_bucket_make_writeable($in))
        {
            //data = strin que estamos recebendo
            //datalen = tamanho da string que estamos recebendo
            //Não sabemos o tamanho que virá nesse data, mas idenpendente disso queremos dividir em linhas
                //Separando no array onde cada indice e uma linha
            $linhas = explode("\n", $bucket->data);


            //Para cada uma dessas linhas eu quero verificar se existe a palavra "parte"
            foreach ($linhas as  $linha) {

                //stripos() = tenta encontrar uma string dentro da outra
                    //se encontra retorna a posição da string
                    //se não encontrar retorna false
                    //esse i do stripos = ignora se é com letrar maiusculas ou minusculas
                if(stripos($linha, 'parte') !== false)
                {
                    //Caso encontre a linha com a palavra, eu adiciono ela a saída mais uma quebra de linha
                    $saida .= "$linha\n";

                    //Adiciono na variavel consumed(o quanto de dados foi consumido) o tamanho dessa linha atual

                }
            }
        }

        //Preciso criar um bucket de saida para enviar para o out
        //Esse bucket tem que ser criado a partir do stream que criamos anteriormente no metodo onCreate()
        //E nesse mesmo stream eu adiciono o conteudo de saida que o 2 parametro da função stream_bucket_new
        $bucketSaida = stream_bucket_new($this->stream, $saida);

        //Agora em saída eu só tenho as linhas que possuem a palavra "parte"
        //Não posso simplesmente atribuir assim porque out é um recurso do mesmo tipo que in
        // $out = $saida;
        //stream_bucket_append() = eu preciso adicionar a esse out um dado que eu preciso criar a partir de outro stream do php
        stream_bucket_append($out, $bucketSaida);
        //out = resultado do filtro

        //Preciso retornar um dado especifico informando que ocorreu tudo bem e que o filtro pode continuar sendo executado
        //PSFS_PASS_ON	Filtro processado com sucesso com dados disponíveis no arquivo out bucket brigade.
        return PSFS_PASS_ON;
    }
}