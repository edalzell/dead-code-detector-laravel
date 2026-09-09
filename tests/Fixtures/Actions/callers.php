<?php

use Edalzell\DeadCodeDetector\Tests\Fixtures\Actions\SendWelcome;
use Edalzell\DeadCodeDetector\Tests\Fixtures\Actions\UpdateProfile;

SendWelcome::run('someone@example.com');
UpdateProfile::run('Erin');
