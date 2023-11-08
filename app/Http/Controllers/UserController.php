<?php

namespace App\Http\Controllers;

use App\Models\Integrante;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $integrantes = Integrante::with('persona')->where('condition', 'Coordinador')->get();
        return Inertia::render('Users/Index', [
            'users' => User::paginate(),
            'integrantes' => $integrantes
        ]);
    }
}
