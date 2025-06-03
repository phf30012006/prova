<?php

namespace App\Http\Controllers;

use App\Services\AutorService;
use App\Http\Requests\AutorRequest;
use App\Http\Requests\AutorUpdateRequest;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LivroResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AutorController extends Controller
{
    private AutorService $autorService;

    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    public function get()
    {
        $autores = $this->autorService->get();
        return AutorResource::collection($autores);
    }

    public function getAutoresComLivros()
    {
        $autores = $this->autorService->getAutoresComLivros();
        return AutorResource::collection($autores);
    }

    public function details(int $id)
    {
        try {
            $autor = $this->autorService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return new AutorResource($autor);
    }

    public function getLivrosPorAutor(int $id)
    {
        try {
            $livros = $this->autorService->getLivrosPorAutor($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return LivroResource::collection($livros);
    }

    public function store(AutorRequest $request)
    {
        $data = $request->validated();
        $autor = $this->autorService->store($data);
        return new AutorResource($autor);
    }

    public function update(int $id, AutorUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $autor = $this->autorService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return new AutorResource($autor);
    }

    public function delete(int $id)
    {
        try {
            $autor = $this->autorService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return new AutorResource($autor);
    }
}