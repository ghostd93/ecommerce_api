<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'data' => $this->collection->transform(function($product){
                return [
                    'name' => $product->name,
                    'total_price' => round((1 - $product->discount / 100) * $product->price / 100, 2),
                    'rating' => $product->reviews->count() > 0 ?
                        round($product->reviews->sum('rating') / $product->reviews->count(), 2) :
                        'No rating yet',
                    'discount' => $product->discount,
                    'href' => [
                        'link' => route('products.show', $product->id)
                    ]
                ];
            })
        ];
    }
}
