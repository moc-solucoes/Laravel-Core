<?php

namespace MOCSolutions\Core\Interfaces;

use Illuminate\View\View;

/**
 * Interface Crud
 * @package App\Http\Interfaces\Crud
 */
interface Crud
{
    public function index(): View;

    public function cadastro(): View;

    public function salvar();

    public function editar(int $id): View;

    public function salvarEdicao(int $id);

    public function excluir(int $id);
}
