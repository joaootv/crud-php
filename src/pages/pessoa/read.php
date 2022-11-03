<?php

require_once '../../../config.php';
require_once '../../../src/actions/pessoa.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$pessoas = readPessoaAction($conn);

?>
<div class="container">
	<div class="row">
		<a href="../../../"><h1>Listagem de Pessoas</h1></a>
		<a class="btn btn-success text-white" href="./create.php">Adicionar Pessoa</a>
	</div>
	<div class="row flex-center">
		<?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
	</div>

	<table class="table-pessoas">
		<tr>
			<th>NOME</th>
			<th>CPF</th>
			<th>EMAIL</th>
			<th>TELEFONE</th>
		</tr>
		<?php foreach($pessoas as $row): ?>
		<tr>
			<td class="pessoa-name"><?=htmlspecialchars($row['nome'])?></td>
			<td class="pessoa-name"><?=htmlspecialchars($row['cpf'])?></td>
			<td class="pessoa-email"><?=htmlspecialchars($row['email'])?></td>
			<td class="pessoa-phone"><?=htmlspecialchars($row['telefone'])?></td>
			<td>
				<a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['id']?>">Editar</a>
			</td>
			<td>
				<a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Remover</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php require_once '../partials/footer.php'; ?>

