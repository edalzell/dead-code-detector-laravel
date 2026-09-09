<?php

namespace Edalzell\DeadCodeDetector;

use Illuminate\Database\Eloquent\Attributes\Scope;
use ReflectionMethod;
use ShipMonk\PHPStan\DeadCode\Provider\ReflectionBasedMemberUsageProvider;
use ShipMonk\PHPStan\DeadCode\Provider\VirtualUsageData;

final class EloquentScopeAttributeUsageProvider extends ReflectionBasedMemberUsageProvider
{
    public function shouldMarkMethodAsUsed(ReflectionMethod $method): ?VirtualUsageData
    {
        if ($method->getAttributes(Scope::class) === []) {
            return null;
        }

        return VirtualUsageData::withNote('A #[Scope] method is reached through the query builder, never called by name.');
    }
}
