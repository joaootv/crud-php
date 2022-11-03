<?php

function findPessoaDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
	$pessoa;

	$sql = "SELECT * FROM pessoas  WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	
	$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $user;
}

function createPessoaDb($conn, $nome, $cpf, $email, $telefone) {
	$nome = mysqli_real_escape_string($conn, $nome);
	$cpf = mysqli_real_escape_string($conn, $cpf);
	$email = mysqli_real_escape_string($conn,  $email);
	$telefone = mysqli_real_escape_string($conn,  $telefone);

	if($nome && $cpf && $email && $telefone) {
		$sql = "INSERT INTO pessoas (nome, cpf, email, phone) VALUES (?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'sss', $nome, $cpf, $email, $phone);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readPessoaDb($conn) {
    $pessoas = [];

	$sql = "SELECT * FROM pessoas";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$pessoas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $pessoas;
}

function updatePessoaDb($conn, $id, $nome, $cpf, $email, $telefone) {
    if($id && $nome && $cpf && $email && $telefone) {
		$sql = "UPDATE pessoas SET nome = ?, cpf = ?, email = ?, telefone = ? WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'sssi', $nome, $cpf, $email, $telefone, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deletePessoaDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM pessoas WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		return true;
	}
}
