<?php

namespace App\Models\Filters;

use Illuminate\Database\Eloquent\Builder;
use Lacodix\LaravelModelFilter\Filters\Filter;

class ProjectFaultDateFilter extends Filter
{
    public function __construct(protected string $field) {}

    public function apply(Builder $query): Builder
    {
        return match ($this->values[0]) {
            'fault_date' => $query->whereNotNull('fault_date'),
        };
    }
}
