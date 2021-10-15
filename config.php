<?php
	// nome do arquivo xml

	// Detecta o sistema operacional do servidor
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $path = dirname(__FILE__) . '\data\\';
    } else {
        $path = dirname(__FILE__) . '/data//';
    }

	//$path = dirname(__FILE__) . '/data//';
	$arquivoXML =  $path . "agenda.xml";
	// php simplexml - lendo os dados do arquivo xml
	$xml = simpledom_load_file($arquivoXML);

	// definindo o tempo EM SEGUNDOS para recarregamento da página index.php
	$tempo = 4;
?>