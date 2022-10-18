<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class ApplicationRepository
{
    public function __construct()
    {
        $this->paginationLimit = config('app.pagination_limit');
    }

    public function paginate(int $limit = null): LengthAwarePaginator
    {
        $page = optional(request())->get('page') ?? 1;

        return $this->builder()->paginate(
            $limit ?? $this->paginationLimit, ['*'], 'page', $page
        );
    }
}
