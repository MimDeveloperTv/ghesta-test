<?php

namespace App\Http\Controllers\API;

use App\Actions\GetChanceAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateChanceRequest;
use App\Http\Resources\API\ChanceResource;

class ChanceController extends Controller
{
    /**
     * @throws \Throwable
     */
    public function take(CreateChanceRequest $request): ChanceResource
    {
        $chance = GetChanceAction::make()->handle();
        return ChanceResource::make($chance);
    }


}
