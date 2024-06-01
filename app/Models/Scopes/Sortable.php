<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait Sortable
{
    const SORTABLE_COLUMNS = ['created_at', 'name'];

    public function scopeSort(Builder $builder): void
    {
        $sort = request()->query('sort') ?? [];

        foreach ($sort as $column) {
            $isDesc = $column[0] === '-';
            $column = ltrim($column, '-');
            if (in_array($column, self::SORTABLE_COLUMNS)) {
                if ($isDesc) {
                    $builder->orderByDesc($column);
                } else {
                    $builder->orderBy($column);
                }
            }
        }
    }
}
