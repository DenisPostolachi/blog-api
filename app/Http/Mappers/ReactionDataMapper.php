<?php

namespace App\Http\Mappers;

use App\Data\ReactionData;
use App\Http\Requests\Reactions\ReactionRequest;
use App\Models\Reaction;

final class ReactionDataMapper
{
    public function mapFromRequestToNormalized(ReactionRequest $request): ReactionData
    {
      return (new ReactionData())->setText($request->text);
    }
}
