<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LivroResource;

class AutorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'id' => $this->id,
            'nome' => $this->nome,
            'data_nascimento' => $this->data_nascimento,
            'biografia' => $this->biografia,
            'livros' => LivroResource::collection($this->whenLoaded('livros'))
        ];
    }
}
