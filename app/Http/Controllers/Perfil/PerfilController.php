<?php

namespace App\Http\Controllers\Perfil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function getRecursos($IDusuario)
    {
        $recursos = DB::table('SEG_PERFILES')
            ->join('SEG_RECURSOS', 'SEG_RECURSOS.ID', '=', 'SEG_PERFILES.RecursoID')
            ->join('SEG_USUARIOS', 'SEG_USUARIOS.ID', '=', 'SEG_PERFILES.UsuarioID')
            ->select('SEG_RECURSOS.Nombre', 'SEG_RECURSOS.Tipo', 'SEG_RECURSOS.ID', 'SEG_RECURSOS.PadreID', 'SEG_RECURSOS.SucursalID')
            ->where('SEG_USUARIOS.ID', '=', $IDusuario)
            ->get();

        return $recursos->toArray();
    }
}
