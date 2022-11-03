<?php

require_once '../../../config.php';
require_once '../../actions/pessoa.php';
require_once '../partials/header.php';

if (isset($_POST["id"], $_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["email"]) && isset($_POST["telefone"]))
    updatePessoaAction($conn, $_POST["id"], $_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["telefone"]);

$pessoa = findPessoaAction($conn, $_GET['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Editar Pessoa</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/pessoa/edit.php" method="POST">
                <input type="hidden" name="id" value="<?=$pessoa['id']?>" required/>
                <label>Nome Completo</label>
                <input type="text" name="nome" value="<?=htmlspecialchars($pessoa['nome'])?>" required/>
                <label>CPF</label>
                <input type="text" name="cpf" value="<?=htmlspecialchars($pessoa['cpf'])?>" required/>
                <label>E-mail</label>
                <input type="email" name="email" value="<?=htmlspecialchars($pessoa['email'])?>" required/>
                <label>Phone</label>
                <input type="text" name="telefone" value="<?=htmlspecialchars($pessoa['telefone'])?>" required/>

                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

