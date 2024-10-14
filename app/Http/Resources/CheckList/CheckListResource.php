<?php

namespace App\Http\Resources\CheckList;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckListResource extends JsonResource
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
            'archive' => $this->archive,
            'type' => $this->typeCheck->only(['id', 'name']),
            'game_id' => $this->game->only(['id', 'name']),
            'period_id' => $this->period->only(['id', 'name']),
        ];
    }
}
