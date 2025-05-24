<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContatoController extends Controller {
    public function index(): View {
        $data = Contato::all();

        return view('index', ['data'=> $data->toArray()]);
    }

    public function create(Request $req): RedirectResponse {
        $nome_contato = $req->nome_contato;
        $email_contato = $req->email_contato;
        $telefone_contato = $req->telefone_contato;

        $contato = new Contato;

        $contato->nome_contato = $nome_contato;
        $contato->email_contato = $email_contato;
        $contato->telefone_contato = $telefone_contato;

        return redirect()->route('/');
    }
    public function edit(): void {

    }
    public function delete(): void {

    }
}
