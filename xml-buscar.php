	<?php
	$result = busca_xml($xml,"dados",$buscar,$opc,$order,$by);
	$conta_result = count($result);
	?>

    <form class="form-inline" action="index.php" name="frmBuscar" method="get">
        <div class="form-group">
            <select name="opc" class="form-control">
                <option value="nome"<?=$opc == "nome" ? " selected=\"selected\"" : ""?>>Nome</option>
                <option value="secretaria"<?=$opc == "secretaria" ? " selected=\"selected\"" : ""?>>Secretaria</option>                
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="buscar" value="<?=$buscar?>" id="idBuscar" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">BUSCAR</button>
        <input type="reset" name="limpar" class="btn" id="btnLimpar" value="LIMPAR">
    </form>
    <br>
	<?php
	// verifica se o array possui dados
	if ($conta_result > 0){
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th><a href="index.php?opc=<?=$opc?>&buscar=<?=$buscar?>&id=<?=$id?>&action=buscar&order=@nome&by=<?=$byC?>">Nome</a></th>
                    <th>Ramal</th>
					<th>Telefone</th>
                    <th>Celular</th>
                    <th>E-mail</a></th>                    
					<th><a href="index.php?opc=<?=$opc?>&buscar=<?=$buscar?>&id=<?=$id?>&action=buscar&order=@secretaria&by=<?=$byC?>">Secretaria</a></th>
                </tr>
            </thead>
	        <?php
		    // montando a tabela com os dados do arquivo xml
		    foreach ($result as $dados)
            {
	        ?>
            <tbody>
                <tr>
                    <td><?=$dados["id"]?></td>
                    <td><?=$dados["nome"]?></td>
					<td><?=$dados["ramal"]?></td>
                    <td><?=$dados["tel"]?></td>
                    <td><?=$dados["cel"]?></td>
                    <td><?=$dados["email"]?></td>
					<td><?=$dados["secretaria"]?></td>
                </tr>
            </tbody>
	        <?php
            }
            ?>
	    </table>
	<?php
	}
    else
    {
	?>
		<div class="alert alert-info"><strong>Aviso!</strong> Nenhum contato cadastrado no momento.</div>
	<?php
    }
    ?>

    
    