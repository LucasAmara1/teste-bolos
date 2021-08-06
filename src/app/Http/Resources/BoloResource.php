<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\DinheiroTrait;

class BoloResource extends JsonResource
{
    use DinheiroTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'nome'   => $this->nome,
            'peso'  => $this->peso,
            'valor'  => $this->formatarReal($this->valor),
            'quantidade'  => $this->quantidade
        ];
    }
}
