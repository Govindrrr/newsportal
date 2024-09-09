<?php

namespace App\Http\Resources;

use Illuminate\Database\PostgresConnection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "title"=>$this->title,
            "nepali_title"=>$this->nep_title,
            "slug"=>$this->slug,
            "post"=>PostResource::collection($this->posts),


        ];

    }
}
