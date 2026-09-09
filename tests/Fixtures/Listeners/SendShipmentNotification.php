<?php

namespace Edalzell\DeadCodeDetector\Tests\Fixtures\Listeners;

class SendShipmentNotification
{
    public function handle(OrderShipped $event): void {}
}
