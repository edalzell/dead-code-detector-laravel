<?php

namespace Edalzell\DeadCodeDetector\Tests\Fixtures\Actions;

use Edalzell\DeadCodeDetector\Tests\Fixtures\Eloquent\Park;
use Lorisleiva\Actions\Concerns\AsObject;

class ArchivePark
{
    use AsObject;

    public function __construct() {}

    public function handle(Park $park): void {}
}
