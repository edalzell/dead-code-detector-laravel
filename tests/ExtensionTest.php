<?php

use Edalzell\DeadCodeDetector\Tests\Analysis;

it('reports nothing dead when every extension is registered', function () {
    expect(Analysis::deadMembers('all'))->toBe([]);
});

it('reports Eloquent trait hooks without EloquentTraitHooksUsageProvider', function () {
    expect(Analysis::deadMembers('without-eloquent-trait-hooks'))
        ->toBe(['HasSlug::bootHasSlug', 'HasSlug::initializeHasSlug']);
});

it('reports a #[Scope] method without EloquentScopeAttributeUsageProvider', function () {
    expect(Analysis::deadMembers('without-eloquent-scope-attribute'))
        ->toBe(['Park::active']);
});
