<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LivroResource;

class GeneroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id,
            'nome'    => $this->nome,
            'livros'  => LivroResource::collection($this->whenLoaded('livros')),
        ];
    }
}