<?php
$id_xml = intval($_GET['id']);
$result = $xml->xpath("dados[@id=$id_xml]");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3><span class="glyphicon glyphicon-edit"></span> EDITAR CONTATO</h3>
    </div>
    <div class="panel-body">
        <form name='frmEditar' class="form-horizontal" method='post' action='index-admin.php?action=edt&id=<?=$id_xml?>'>
            <input type="hidden" name="submit" value="1">
            <?php
            foreach ($result as $indice => $dados)
            {
                ?>
                <div class="form-group">
                    <label for="inputNome" class="col-sm-2 control-label">Nome:*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNome" name='inputNome' placeholder="nome completo" value="<?=$dados['nome']?>" required>
                    </div>
                </div>
				<div class="form-group">
					<label for="inputRamal" class="col-sm-2 control-label">Ramal:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputRamal" name='inputRamal' placeholder="ramal" value="<?=$dados['ramal']?>">
					</div>
				</div>
                <div class="form-group">
                    <label for="inputTel" class="col-sm-2 control-label">Tel:*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control mask-phone" id="inputTel" name='inputTel' placeholder="telefone" value="<?=$dados['tel']?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCel" class="col-sm-2 control-label">Cel:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control mask-phone" id="inputCel" name='inputCel' placeholder="celular" value="<?=$dados['cel']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNome" class="col-sm-2 control-label">E-mail:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name='inputEmail' placeholder="e-mail" value="<?=$dados['email']?>">
                    </div>
                </div>
				<div class="form-group">
				  <label for="inputSecretaria" class="col-sm-2 control-label">Secretaria</label>
				  <div class="col-sm-10">
					  <select class="form-control" id="inputSecretaria" name="inputSecretaria" value="<?=$dados['secretaria']?>">
						<option>Gestão</option>
						<option>Gabinete</option>
						<option>Finanças</option>
						<option>Saúde</option>
					  </select>
				   </div>
				</div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type='submit' value='ATUALIZAR' class='btn btn-primary' id='btnAtualizar'>
                        <button type="button" class='btn btn-default' id='btnCancelar'>CANCELAR</button>
                    </div>
                </div>
                <?php
            }
            ?>
        </form>
    </div>
</div>
<?php
if (isset($_POST['submit']) && $_POST['submit'] == 1)
{
    $nome	= $_POST["inputNome"];
	$ramal	= $_POST["inputRamal"];
    $tel	= $_POST["inputTel"];
    $cel	= $_POST["inputCel"];
    $email	= $_POST["inputEmail"];
    $secretaria	= $_POST["inputSecretaria"];

    foreach ($result as $indice => $dados)
    {
        $dados['nome'] 	= $nome;
		$dados['ramal'] = $ramal;
        $dados['tel'] 	= $tel;
        $dados['cel'] 	= $cel;
        $dados['email'] = $email;
        $dados['secretaria'] = $secretaria;
    }

    // inserindo os novos dados no arquivo xml
    file_put_contents( 'agenda.xml', $xml->asPrettyXML() );
    ?>
    <div class="alert alert-success"><strong>Sucesso!</strong> Registro atualizado corretamente.</div>
    <!-- // refresh para retornar a página principal -->
    <meta HTTP-EQUIV='refresh' CONTENT='<?=$tempo?>;URL=index-admin.php'>
    <?php
}
?>