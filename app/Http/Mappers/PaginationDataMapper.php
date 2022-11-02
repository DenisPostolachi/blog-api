<?php

declare(strict_types=1);

namespace App\Http\Mappers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class PaginationDataMapper
{
    /**
     * @template T of JsonResource
     * @param class-string<T> $itemResourceClass
     */
    public function __construct(private string $itemResourceClass = JsonResource::class)
    {
    }

    /**
     * @param LengthAwarePaginator $pagination
     *
     * @return array<string, mixed>
     */
    public function mapToPaginatedResponse(LengthAwarePaginator $pagination): array
    {
        return [
            'items'    => $this->mapItems($pagination->items(), $this->itemResourceClass),
            'total'    => $pagination->total(),
            'current'  => $pagination->currentPage(),
            'per_page' => $pagination->perPage(),
        ];
    }

    /**
     * @param Model[] $items
     *
     * @template T of JsonResource
     * @param class-string<T> $type
     *
     * @return Collection<int, T>
     */
    protected function mapItems(array $items, string $type): Collection
    {
        return collect($items)->mapInto($type);
    }
}
