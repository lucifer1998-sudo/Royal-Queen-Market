<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDeliveryOptionSettings extends Model
{
    use HasFactory, Uuids;
    protected $table = 'user_delivery_option_settings';
    protected $guarded = [];
}
