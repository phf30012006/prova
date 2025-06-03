<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ReviewResource;

class UsuarioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id,
            'nome'    => $this->nome,
            'email'   => $this->email,
            'senha'   => $this->senha,
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
        ];
    }
}