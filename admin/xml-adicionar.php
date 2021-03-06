<div class="panel panel-default">
    <div class="panel-heading">
        <h3><span class="glyphicon glyphicon-plus"></span> ADICIONAR CONTATO</h3>
    </div>
    <div class="panel-body">
        <form name="frmAdicionar" method="post" action="index.php?action=add" class="form-horizontal">
            <input type="hidden" name="submit" value="1">

            <div class="form-group">
                <label for="inputNome" class="col-sm-2 control-label">Nome:*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNome" name='inputNome' placeholder="nome completo" maxlength="40" required>
                </div>
            </div>
			<div class="form-group">
                <label for="inputNome" class="col-sm-2 control-label">Ramal:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputRamal" name='inputRamal' placeholder="ramal" maxlength="4">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTel" class="col-sm-2 control-label">Telefone:*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control mask-phone" id="inputTel" name='inputTel' placeholder="telefone" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputCel" class="col-sm-2 control-label">Celular:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control mask-celular" id="inputCel" name='inputCel' placeholder="celular">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSetor" class="col-sm-2 control-label">Setor:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSetor" name='inputSetor' placeholder="setor" maxlength="30">
                </div>
            </div>
            <div class="form-group">
			  <label for="inputSecretaria" class="col-sm-2 control-label">Secretaria:</label>
			  <div class="col-sm-10">
				  <select class="form-control" id="inputSecretaria" name="inputSecretaria">					
                    <option>Agricultura</option>
                    <option>Des. Econ&ocirc;mico</option>
                    <option>Educa&ccedil;&atilde;o</option>
					<option>Finan&ccedil;as</option>
                    <option>Gabinete</option>
					<option>Gest&atilde;o</option>
					<option>Habita&ccedil;&atilde;o</option>
                    <option>Obras</option>                                      
                    <option>Planejamento</option>
                    <option>Sa&uacute;de</option>
				  </select>
			   </div>
			</div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type='submit' value='ADICIONAR' class='btn btn-success' id='btnAtualizar'>
                    <button type="button" class='btn btn-default' id='btnCancelar'>CANCELAR</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit']) && $_POST['submit'] == 1)
{
    // pegando o ultimo elemento (n??) do xml
    $getLastID = $xml->xpath("dados[last()]");

    if(!empty($getLastID)){
        $lastID	= $getLastID[0]['id'];
    }else{
        $lastID	= 0;
    };

    // atribuindo os dados via post
    $id		= $lastID+1;
    $nome	= $_POST["inputNome"];
	$ramal	= $_POST["inputRamal"];
    $tel	= $_POST["inputTel"];
    $cel	= !empty($_POST["inputCel"]) ? $_POST["inputCel"] : "";
    $setor	= $_POST["inputSetor"];
    $secretaria	= $_POST["inputSecretaria"];

    // criando um novo n?? com seus atributos
    $dados = $xml->addChild('dados');
    $dados->addAttribute('id', $id);
    $dados->addAttribute('nome', $nome);
	$dados->addAttribute('ramal', $ramal);
    $dados->addAttribute('tel', $tel);
    $dados->addAttribute('cel', $cel);
    $dados->addAttribute('setor', $setor);
    $dados->addAttribute('secretaria', $secretaria);

    // inserindo os dados no arquivo xml
    file_put_contents( $arquivoXML, $xml->asPrettyXML() );
    ?>
    <div class="alert alert-success"><strong>Sucesso!</strong> Dados inseridos corretamente.</div>
    <!--// refresh para retornar a p??gina principal -->
    <meta HTTP-EQUIV='refresh' CONTENT='<?=$tempo?>;URL=index.php'>
    <?php
}
?>