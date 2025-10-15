<?php

namespace App\Http\Controllers\Soporte;

use App\Http\Controllers\Controller;

class ReclamosController extends Controller
{
    public function index()
    {
        return response()->json([
            ['id'=>1,'codigo'=>'REC-001','tipo'=>'Académico','estado'=>'Abierto','fecha'=>'2025-10-02'],
            ['id'=>2,'codigo'=>'REC-002','tipo'=>'Administrativo','estado'=>'En proceso','fecha'=>'2025-10-03'],
        ]);
    }
}
