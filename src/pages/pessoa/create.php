<?php

require_once '../../../config.php';
require_once '../../actions/pessoa.php';
require_once '../partials/header.php';

if (isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["email"]) && isset($_POST["telefone"]))
    createPessoaAction($conn, $_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["telefone"]);

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Cadastro de Pessoa</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/pessoa/create.php" method="POST">
                <label>Nome Completo</label>
                <input type="text" name="nome" required/>
                <label>CPF</label>
                <input type="text" name="cpf" required/>
                <label>E-mail</label>
                <input type="email" name="email" required/>
                <label>Telefone</label>
                <input type="text" name="telefone" required/>

                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

