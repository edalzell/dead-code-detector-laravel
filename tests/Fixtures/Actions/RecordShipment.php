<?php

namespace Edalzell\DeadCodeDetector\Tests\Fixtures\Actions;

use Edalzell\DeadCodeDetector\Tests\Fixtures\Listeners\OrderShipped;
use Lorisleiva\Actions\Concerns\AsAction;

class RecordShipment
{
    use AsAction;

    public function handle(OrderShipped $event): void {}
}
