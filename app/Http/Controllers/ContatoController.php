<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ContatoController extends Controller {
    public function index(): View {
        $data = Contato::all();

        return view('index', ['data'=> $data->toArray()]);
    }

    public function create(Request $req): JsonResponse {
        $nome_contato = $req->input('nome_contato');
        $email_contato = $req->input('email_contato');
        $telefone_contato = $req->input('telefone_contato');

        $contato = new Contato;

        $contato->nome_contato = $nome_contato;
        $contato->email_contato = $email_contato;
        $contato->telefone_contato = $telefone_contato;

        $saved = $contato->save();

        if($saved) return response()->json(['message' => 'Contato adicionado'], Response::HTTP_CREATED);

        return response()->json(['error' => 'Erro interno'], Response::HTTP_BAD_REQUEST);

    }
    public function delete(Request $req): JsonResponse {
        $email_contato = $req->input('email_contato'); // mais seguro

        $contato = Contato::where('email_contato', $email_contato)->first();

        if ($contato) {
            $contato->forceDelete();
            return response()->json(['message' => 'Contato deletado'], Response::HTTP_ACCEPTED);
        }

        return response()->json(['error' => 'Contato não encontrado'], Response::HTTP_NOT_FOUND);
    }
}
