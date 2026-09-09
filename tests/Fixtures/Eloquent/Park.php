<?php

namespace Edalzell\DeadCodeDetector\Tests\Fixtures\Eloquent;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('active', true);
    }
}
