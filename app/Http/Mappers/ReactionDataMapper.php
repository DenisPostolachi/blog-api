<?php

declare(strict_types=1);

namespace App\Http\Mappers;

use App\Data\ReactionData;
use App\Http\Requests\Reactions\ReactionRequest;

final class ReactionDataMapper
{
    public function mapFromRequestToNormalized(ReactionRequest $request): ReactionData
    {
      return (new ReactionData())->setText($request->text);
    }
}
