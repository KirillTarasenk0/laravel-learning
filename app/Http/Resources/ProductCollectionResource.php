<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollectionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'productName' => $this->productName,
            'buyPrice' => $this->buyPrice,
            'productLine' => $this->productLine
        ];
    }
}
