<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anuncio;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $anuncioModel = new Anuncio();
        $anuncios = $anuncioModel->getAnunciosUsuario($user->id);
        return view('dash', ['user' => $user, 'anuncios' => $anuncios]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}
