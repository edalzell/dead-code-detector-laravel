<?php

namespace Edalzell\DeadCodeDetector;

use ReflectionMethod;
use ShipMonk\PHPStan\DeadCode\Provider\ReflectionBasedMemberUsageProvider;
use ShipMonk\PHPStan\DeadCode\Provider\VirtualUsageData;

final class EloquentTraitHooksUsageProvider extends ReflectionBasedMemberUsageProvider
{
    public function shouldMarkMethodAsUsed(ReflectionMethod $method): ?VirtualUsageData
    {
        if (preg_match('/^(boot|initialize)[A-Z]/', $method->getName()) !== 1) {
            return null;
        }

        $class = $method->getDeclaringClass();

        if ($class->isTrait()) {
            return $this->usage();
        }

        foreach ($class->getTraits() as $trait) {
            if (! $trait->hasMethod($method->getName())) {
                continue;
            }

            if ($trait->getMethod($method->getName())->getFileName() === $method->getFileName()) {
                return $this->usage();
            }
        }

        return null;
    }

    private function usage(): VirtualUsageData
    {
        return VirtualUsageData::withNote('Eloquent invokes trait boot{Name}/initialize{Name} hooks reflectively.');
    }
}
