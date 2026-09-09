<?php

namespace Edalzell\DeadCodeDetector\Tests\Fixtures\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasSlug;
}
