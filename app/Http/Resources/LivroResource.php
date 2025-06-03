<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AutorResource;
use App\Http\Resources\GeneroResource;
use App\Http\Resources\ReviewResource;

class LivroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'titulo'    => $this->titulo,
            'sinopse'   => $this->sinopse,
            'genero_id' => $this->genero_id,
            'autor_id' => $this->autor_id,
            'autor'     => new AutorResource($this->whenLoaded('autor')),
            'genero'    => new GeneroResource($this->whenLoaded('genero')),
        ];
    }
}