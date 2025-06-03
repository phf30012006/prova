<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LivroResource;
use App\Http\Resources\UsuarioResource;

class ReviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'nota'      => $this->nota,
            'texto'=> $this->texto,
            'livro_id'  => $this->livro_id,
            'usuario_id'=> $this->usuario_id,
            'livro'     => new LivroResource($this->whenLoaded('livro')),
            'usuario'   => new UsuarioResource($this->whenLoaded('usuario')),
        ];
    }
}