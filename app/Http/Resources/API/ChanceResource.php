<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class ChanceResource extends JsonResource
{
    public function toArray($request) //phpcs:ignore
    {
        return [
            'chance_id' => data_get($this->resource, 'id'),
            'chance' => data_get($this->resource, 'chance'),
        ];
    }
}
