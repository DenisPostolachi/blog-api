<?php

declare(strict_types=1);

namespace App\Http\Mappers;

use App\Data\ArticleData;
use App\Http\Requests\Articles\ArticleRequest;

final class ArticleDataMapper
{
    public function mapFromRequestToNormalized(ArticleRequest $request): ArticleData
    {
        return (new ArticleData())
            ->setTitle($request->title)
            ->setText($request->text)
            ->setStartDate($request->start_date)
            ->setEndDate($request->end_date);
    }
}
