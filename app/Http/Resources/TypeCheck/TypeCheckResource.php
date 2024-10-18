<?php

namespace App\Http\Resources\TypeCheck;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeCheckResource extends JsonResource
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
            'name' => $this->name,
            'option1' => $this->option1,
            'option2' => $this->option2,
            'option3' => $this->option3,
        ];
    }
}
