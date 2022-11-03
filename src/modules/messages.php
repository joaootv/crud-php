<?php

function printMessage($message) {
    if ($message=='success-create')
        return '<span class="text-success">Cadastrado com sucesso!</span>';
    if ($message=='error-create')
        return '<span class="text-error">Erro ao cadastrar.</span>';

    if ($message=='success-remove')
        return '<span class="text-success">Removido com sucesso!</span>';
    if ($message=='error-remove')
        return '<span class="text-error">Erro ao remover dados.</span>';

    if ($message=='success-update')
        return '<span class="text-success">Alterado com sucesso!</span>';
    if ($message=='error-update')
        return '<span class="text-error">Erro ao atualizar arquivo.</span>';
}
