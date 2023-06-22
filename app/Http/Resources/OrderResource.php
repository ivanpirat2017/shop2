<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $this
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $sum=0;
        foreach ($this->order_products as $product) {
            $sum+=$product->price;
        }
        return [
            'id'=> $this->id,
            'user_id'=> $this->user_id,
            'description'=> $this->description,
            'adress'=> $this->adress,
            'products'=> $this->order_products,
            'code'=> $this->code,
            "sum"=> $sum
        ];
    }
}
