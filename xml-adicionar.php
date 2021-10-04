<div class="panel panel-default">
    <div class="panel-heading">
        <h3><span class="glyphicon glyphicon-plus"></span> ADICIONAR CONTATO</h3>
    </div>
    <div class="panel-body">
        <form name="frmAdicionar" method="post" action="index-admin.php?action=add" class="form-horizontal">
            <input type="hidden" name="submit" value="1">

            <div class="form-group">
                <label for="inputNome" class="col-sm-2 control-label">Nome:*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNome" name='inputNome' placeholder="nome completo" required>
                </div>
            </div>
			<div class="form-group">
                <label for="inputNome" class="col-sm-2 control-label">Ramal:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputRamal" name='inputRamal' placeholder="ramal">
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
                    <input type="text" class="form-control mask-phone" id="inputCel" name='inputCel' placeholder="celular">
                </div>
            </div>
            <div class="form-group">
                <label for="inputNome" class="col-sm-2 control-label">E-mail:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name='inputEmail' placeholder="e-mail">
                </div>
            </div>
            <div class="form-group">
			  <label for="inputSecretaria" class="col-sm-2 control-label">Secretaria:</label>
			  <div class="col-sm-10">
				  <select class="form-control" id="inputSecretaria" name="inputSecretaria">
					<option>Gestão</option>
					<option>Gabinete</option>
					<option>Finanças</option>
					<option>Saúde</option>
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
    // pegando o ultimo elemento (nó) do xml
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
    $email	= $_POST["inputEmail"];
    $secretaria	= $_POST["inputSecretaria"];

    // criando um novo nó com seus atributos
    $dados = $xml->addChild('dados');
    $dados->addAttribute('id', $id);
    $dados->addAttribute('nome', $nome);
	$dados->addAttribute('ramal', $ramal);
    $dados->addAttribute('tel', $tel);
    $dados->addAttribute('cel', $cel);
    $dados->addAttribute('email', $email);
    $dados->addAttribute('secretaria', $secretaria);

    // inserindo os dados no arquivo xml
    file_put_contents( 'agenda.xml', $xml->asPrettyXML() );
    ?>
    <div class="alert alert-success"><strong>Sucesso!</strong> Dados inseridos corretamente.</div>
    <!--// refresh para retornar a página principal -->
    <meta HTTP-EQUIV='refresh' CONTENT='<?=$tempo?>;URL=index-admin.php'>
    <?php
}
?>