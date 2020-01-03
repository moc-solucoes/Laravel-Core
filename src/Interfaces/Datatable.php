<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface Datatable
 * @package App\Http\Interfaces\Datatable
 */
interface Datatable
{
    public function getQuantidade($search, $filtro): int;

    public function getTotalFiltrado($search, $filtro): int;

    public function getResultadoBuscaPaginado($search, $start, $length, $filtro): Collection;
}
