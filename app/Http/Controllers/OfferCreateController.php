<?php

namespace App\Http\Controllers;

use App\Http\DTO\OfferDto;
use App\Http\Request\OfferCreateFormRequest;
use Illuminate\Routing\Controller as BaseController;

class OfferCreateController extends BaseController
{
    public function create(OfferCreateFormRequest $request): OfferDto
    {
        return $request->toDto();
    }
}
