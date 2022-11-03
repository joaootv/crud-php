<?php

require_once '../../database/pessoa.php';

function findPessoaAction($conn, $id) {
	return findPessoaDb($conn, $id);
}

function readPessoaAction($conn) {
	return readPessoaDb($conn);
}

function createPessoaAction($conn, $nome, $cpf, $email, $telefone) {
	$createUserDb = createPessoaDb($conn, $nome, $cpf, $email, $telefone);
	$message = $createUserDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updatePessoaAction($conn, $id, $nome, $cpf, $email, $telefone) {
	$updateUserDb = updatePessoaDb($conn, $id, $nome, $cpf, $email, $telefone);
	$message = $updateUserDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deletePessoaAction($conn, $id) {
	$deleteUserDb = deletePessoaDb($conn, $id);
	$message = $deleteUserDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./read.php?message=$message");
}
