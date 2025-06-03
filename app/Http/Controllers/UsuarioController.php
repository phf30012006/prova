<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Http\Resources\UsuarioResource;
use App\Http\Resources\ReviewResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuarioController extends Controller
{
    private UsuarioService $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function get()
    {
        $usuarios = $this->usuarioService->get();
        return UsuarioResource::collection($usuarios);
    }

    public function details(int $id)
    {
        try {
            $usuario = $this->usuarioService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return new UsuarioResource($usuario);
    }

    public function store(UsuarioRequest $request)
    {
        $data = $request->validated();
        $usuario = $this->usuarioService->store($data);
        return new UsuarioResource($usuario);
    }

    public function update(int $id, UsuarioUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $usuario = $this->usuarioService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return new UsuarioResource($usuario);
    }

    public function delete(int $id)
    {
        try {
            $usuario = $this->usuarioService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return new UsuarioResource($usuario);
    }

    public function getReviewsPorUsuario(int $id)
    {
        try {
            $reviews = $this->usuarioService->getReviewsPorUsuario($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return ReviewResource::collection($reviews);
    }
}