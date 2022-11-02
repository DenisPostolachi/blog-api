<?php

declare(strict_types=1);

namespace App\Http\Mappers;

use App\Data\CommentData;
use App\Http\Requests\Comments\CommentRequest;

final class CommentDataMapper extends PaginationDataMapper
{
    public function mapFromRequestToNormalized(CommentRequest $request): CommentData
    {
        return (new CommentData())->setText($request->text);
    }
}
