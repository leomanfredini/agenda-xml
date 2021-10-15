<?php
$id_xml = intval($_GET['id']);
$result = $xml->xpath("dados[@id=$id_xml]");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3><span class="glyphicon glyphicon-edit"></span> EDITAR CONTATO</h3>
    </div>
    <div class="panel-body">
        <form name='frmEditar' class="form-horizontal" method='post' action='index.php?action=edt&id=<?=$id_xml?>'>
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
                        <input type="text" class="form-control mask-celular" id="inputCel" name='inputCel' placeholder="celular" value="<?=$dados['cel']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSetor" class="col-sm-2 control-label">Setor:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSetor" name='inputSetor' placeholder="setor" maxlength="30" value="<?=$dados['setor']?>">
                    </div>
                </div>
				<div class="form-group">
				  <label for="inputSecretaria" class="col-sm-2 control-label">Secretaria</label>
				  <div class="col-sm-10">
					  <select class="form-control" id="inputSecretaria" name="inputSecretaria" value="<?=$dados['secretaria']?>">
                        <option <?php if($dados['secretaria']=="Agricultura") echo 'selected="selected"'; ?> >Agricultura</option>
                        <option <?php if($dados['secretaria']=="Des. Econômico") echo 'selected="selected"'; ?> >Des. Econ&ocirc;mico</option>
                        <option <?php if($dados['secretaria']=="Educação") echo 'selected="selected"'; ?> >Educa&ccedil;&atilde;o</option>
					    <option <?php if($dados['secretaria']=="Finanças") echo 'selected="selected"'; ?> >Finan&ccedil;as</option>
                        <option <?php if($dados['secretaria']=="Gabinete") echo 'selected="selected"'; ?> >Gabinete</option>
					    <option <?php if($dados['secretaria']=="Gestão") echo 'selected="selected"'; ?> >Gest&atilde;o</option>
					    <option <?php if($dados['secretaria']=="Habitação") echo 'selected="selected"'; ?> >Habita&ccedil;&atilde;o</option>
                        <option <?php if($dados['secretaria']=="Obras") echo 'selected="selected"'; ?> >Obras</option>                                      
                        <option <?php if($dados['secretaria']=="Planejamento") echo 'selected="selected"'; ?> >Planejamento</option>
                        <option <?php if($dados['secretaria']=="Saúde") echo 'selected="selected"'; ?> >Sa&uacute;de</option>
					  </select>
				   </div>
				</div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type='submit' value='ATUALIZAR' class='btn btn-success' id='btnAtualizar'>
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
    $setor	= $_POST["inputSetor"];
    $secretaria	= $_POST["inputSecretaria"];

    foreach ($result as $indice => $dados)
    {
        $dados['nome'] 	= $nome;
		$dados['ramal'] = $ramal;
        $dados['tel'] 	= $tel;
        $dados['cel'] 	= $cel;
        $dados['setor'] = $setor;
        $dados['secretaria'] = $secretaria;
    }

    // inserindo os novos dados no arquivo xml
    file_put_contents( $arquivoXML, $xml->asPrettyXML() );
    ?>
    <div class="alert alert-success"><strong>Sucesso!</strong> Registro atualizado corretamente.</div>
    <!-- // refresh para retornar a página principal -->
    <meta HTTP-EQUIV='refresh' CONTENT='<?=$tempo?>;URL=index.php'>
    <?php
}
?>