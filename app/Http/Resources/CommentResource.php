<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //Me lo pasa a Array (JSON) previamente, para acceder a él más fácil y mejorar el mantenimiento de la API
        //Estandarización de ApiRestful, reusabilidad, separación de lógica, serialización y transformación de datos,
        //Consistencia

        return [
            'id'=>$this->id,
            'body' => $this->body,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
