<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Hashidable;

class Ban extends Model
{
    use Uuids;
    public $incrementing = false;

}
